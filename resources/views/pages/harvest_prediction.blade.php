@extends('main.layout')

@section('body-attr', 'style=background:linear-gradient(135deg, #0b3d0b, #a7d7a7);')

@section('title', 'Prediksi panen')

@section('container')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.89);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.25);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 2rem;
        margin-bottom: 2rem;
    }
    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 36px 0 rgba(0, 0, 0, 0.3);
    }
    .welcome-title {
        color: #145214;
        font-weight: 700;
        font-size: 2.2rem;
        margin-bottom: 1.5rem;
        text-shadow: 1px 1px 3px rgba(5, 43, 5, 0.2);
        position: relative;
        padding-bottom: 10px;
    }
    .welcome-title::after {
        content: '';
        position: absolute;
        width: 80px;
        height: 4px;
        background: #145214;
        bottom: 0;
        left: 0;
        border-radius: 2px;
    }
    .dashboard-section {
        margin-top: 2rem;
    }
    .section-title {
        color: #145214;
        font-weight: 600;
        font-size: 1.5rem;
        margin-bottom: 1rem;
        border-bottom: 2px solid #145214;
        padding-bottom: 0.5rem;
    }
    .form-control {
        border-radius: 10px;
        border: 1px solid #0b3d0b;
        padding: 12px 15px;
    }
    .btn-primary {
        background-color: #0b3d0b;
        border-color: #0b3d0b;
        border-radius: 10px;
        padding: 12px 25px;
        font-weight: 600;
    }
    .btn-primary:hover {
        background-color: #145214;
        border-color: #145214;
    }
    .result-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 12px;
        padding: 20px;
        margin-top: 20px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }
    .parameter-item {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }
    .parameter-value {
        font-weight: 600;
        color: #0b3d0b;
    }
    .prediction-result {
        font-size: 1.3rem;
        font-weight: 700;
        color: #0b3d0b;
        margin-top: 15px;
    }
    .crop-suggestion {
        background: #f0f7f0;
        padding: 15px;
        border-radius: 8px;
        margin-top: 15px;
    }
    .loading-spinner {
        display: none;
        text-align: center;
        margin: 20px 0;
    }
    .spinner-border {
        color: #0b3d0b;
    }
</style>

<div class="glass-card">
    <h1 class="welcome-title">Prediksi Panen</h1>

    <div class="dashboard-section">
        <form id="harvestPredictionForm">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="province">Provinsi</label>
                        <select class="form-control" id="province" name="province" required>
                            <option value="">Pilih Provinsi</option>
                            <!-- Options will be filled by JavaScript -->
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="regency">Kabupaten/Kota</label>
                        <select class="form-control" id="regency" name="regency" required disabled>
                            <option value="">Pilih Kabupaten/Kota</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="district">Kecamatan</label>
                        <select class="form-control" id="district" name="district" required disabled>
                            <option value="">Pilih Kecamatan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="village">Desa/Kelurahan</label>
                        <select class="form-control" id="village" name="village" required disabled>
                            <option value="">Pilih Desa/Kelurahan</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Prediksi Panen</button>
            </div>
        </form>
        
        <div class="loading-spinner" id="loadingSpinner">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <p class="mt-2">Mengambil data dan menganalisis...</p>
        </div>
        
        <div class="result-card" id="predictionResult" style="display: none;">
            <h4 class="section-title">Hasil Prediksi</h4>
            <div id="locationInfo"></div>
            
            <div class="mt-3">
                <h5>Kondisi Lingkungan:</h5>
                <div id="environmentInfo"></div>
            </div>
            
            <div class="mt-3">
                <h5>Prediksi Hasil Panen:</h5>
                <div class="prediction-result" id="harvestPrediction"></div>
                <div class="crop-suggestion" id="cropSuggestion"></div>
            </div>
            
            <div class="mt-3">
                <h5>Rekomendasi:</h5>
                <div id="recommendations"></div>
            </div>
            
            <div class="mt-3 text-muted small">
                <p>Data diperbarui: <span id="dataUpdatedAt"></span></p>
                <p>Sumber data: API BMKG & Kementerian Pertanian</p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Load province data from API
        fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
            .then(response => response.json())
            .then(provinces => {
                const provinceSelect = document.getElementById('province');
                provinces.forEach(province => {
                    const option = document.createElement('option');
                    option.value = province.id;
                    option.textContent = province.name;
                    provinceSelect.appendChild(option);
                });
            });
        
        // Province change event
        document.getElementById('province').addEventListener('change', function() {
            const provinceId = this.value;
            const regencySelect = document.getElementById('regency');
            
            regencySelect.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';
            regencySelect.disabled = !provinceId;
            
            if (provinceId) {
                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
                    .then(response => response.json())
                    .then(regencies => {
                        regencies.forEach(regency => {
                            const option = document.createElement('option');
                            option.value = regency.id;
                            option.textContent = regency.name;
                            regencySelect.appendChild(option);
                        });
                    });
            }
            
            // Reset district and village
            document.getElementById('district').innerHTML = '<option value="">Pilih Kecamatan</option>';
            document.getElementById('district').disabled = true;
            document.getElementById('village').innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';
            document.getElementById('village').disabled = true;
        });
        
        // Regency change event
        document.getElementById('regency').addEventListener('change', function() {
            const regencyId = this.value;
            const districtSelect = document.getElementById('district');
            
            districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
            districtSelect.disabled = !regencyId;
            
            if (regencyId) {
                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${regencyId}.json`)
                    .then(response => response.json())
                    .then(districts => {
                        districts.forEach(district => {
                            const option = document.createElement('option');
                            option.value = district.id;
                            option.textContent = district.name;
                            districtSelect.appendChild(option);
                        });
                    });
            }
            
            // Reset village
            document.getElementById('village').innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';
            document.getElementById('village').disabled = true;
        });
        
        // District change event
        document.getElementById('district').addEventListener('change', function() {
            const districtId = this.value;
            const villageSelect = document.getElementById('village');
            
            villageSelect.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';
            villageSelect.disabled = !districtId;
            
            if (districtId) {
                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${districtId}.json`)
                    .then(response => response.json())
                    .then(villages => {
                        villages.forEach(village => {
                            const option = document.createElement('option');
                            option.value = village.id;
                            option.textContent = village.name;
                            villageSelect.appendChild(option);
                        });
                    });
            }
        });
        
        // Form submission
        document.getElementById('harvestPredictionForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const province = document.getElementById('province');
            const regency = document.getElementById('regency');
            const district = document.getElementById('district');
            const village = document.getElementById('village');
            
            if (!province.value || !regency.value || !district.value || !village.value) {
                alert('Silakan lengkapi semua data wilayah!');
                return;
            }
            
            // Show loading spinner
            document.getElementById('loadingSpinner').style.display = 'block';
            document.getElementById('predictionResult').style.display = 'none';
            
            // Simulate API call to government weather and soil data
            // In a real implementation, this would call your backend which then calls government APIs
            setTimeout(() => {
                // This is a simulation - in real app you would call actual APIs
                const selectedProvince = province.options[province.selectedIndex].text;
                const selectedRegency = regency.options[regency.selectedIndex].text;
                const selectedDistrict = district.options[district.selectedIndex].text;
                const selectedVillage = village.options[village.selectedIndex].text;
                
                // Mock data - replace with actual API calls in production
                const mockWeatherData = {
                    temperature: 28 + Math.floor(Math.random() * 5),
                    humidity: 70 + Math.floor(Math.random() * 20),
                    rainfall: Math.floor(Math.random() * 100),
                    sunlight: 8 + Math.floor(Math.random() * 4)
                };
                
                const mockSoilData = {
                    pH: (6.0 + Math.random() * 1.5).toFixed(1),
                    nitrogen: (0.1 + Math.random() * 0.3).toFixed(2),
                    phosphorus: (15 + Math.random() * 30).toFixed(0),
                    potassium: (100 + Math.random() * 200).toFixed(0),
                    moisture: (40 + Math.random() * 40).toFixed(0)
                };
                
                // Determine prediction based on conditions
                let prediction, suggestion, recommendations;
                
                if (mockWeatherData.rainfall > 70 && mockSoilData.moisture > 60) {
                    prediction = "Potensi hasil panen BAIK";
                    suggestion = "Padi, Jagung, atau Singkong";
                    recommendations = [
                        "Perhatikan saluran drainase untuk menghindari genangan air berlebihan",
                        "Pemupukan nitrogen dapat dikurangi karena kandungan tanah sudah cukup",
                        "Waspada terhadap hama yang berkembang biak di kondisi lembab"
                    ];
                } else if (mockWeatherData.rainfall < 30 && mockSoilData.moisture < 50) {
                    prediction = "Potensi hasil panen SEDANG (perlu irigasi)";
                    suggestion = "Kedelai, Kacang Tanah, atau Gandum";
                    recommendations = [
                        "Perlu sistem irigasi tambahan untuk menjaga kelembaban tanah",
                        "Pemupukan kalium dapat membantu tanaman bertahan di kondisi kering",
                        "Pilih varietas tanaman yang tahan kekeringan"
                    ];
                } else {
                    prediction = "Potensi hasil panen SANGAT BAIK";
                    suggestion = "Berbagai jenis tanaman cocok ditanam";
                    recommendations = [
                        "Pertahankan kondisi tanah dengan rotasi tanaman",
                        "Pemupukan seimbang sesuai kebutuhan tanaman",
                        "Pantau perkembangan tanaman secara rutin"
                    ];
                }
                
                // Display results
                document.getElementById('locationInfo').innerHTML = `
                    <p><strong>Lokasi:</strong> ${selectedVillage}, ${selectedDistrict}, ${selectedRegency}, ${selectedProvince}</p>
                `;
                
                document.getElementById('environmentInfo').innerHTML = `
                    <div class="parameter-item">
                        <span>Suhu Udara:</span>
                        <span class="parameter-value">${mockWeatherData.temperature}°C</span>
                    </div>
                    <div class="parameter-item">
                        <span>Kelembaban:</span>
                        <span class="parameter-value">${mockWeatherData.humidity}%</span>
                    </div>
                    <div class="parameter-item">
                        <span>Curah Hujan:</span>
                        <span class="parameter-value">${mockWeatherData.rainfall} mm</span>
                    </div>
                    <div class="parameter-item">
                        <span>Penyinaran Matahari:</span>
                        <span class="parameter-value">${mockWeatherData.sunlight} jam/hari</span>
                    </div>
                    <div class="parameter-item">
                        <span>pH Tanah:</span>
                        <span class="parameter-value">${mockSoilData.pH}</span>
                    </div>
                    <div class="parameter-item">
                        <span>Nitrogen Tanah:</span>
                        <span class="parameter-value">${mockSoilData.nitrogen}%</span>
                    </div>
                `;
                
                document.getElementById('harvestPrediction').textContent = prediction;
                document.getElementById('cropSuggestion').innerHTML = `<strong>Tanaman yang disarankan:</strong> ${suggestion}`;
                
                const recommendationsList = recommendations.map(rec => `<li>${rec}</li>`).join('');
                document.getElementById('recommendations').innerHTML = `<ul>${recommendationsList}</ul>`;
                
                const now = new Date();
                document.getElementById('dataUpdatedAt').textContent = now.toLocaleString();
                
                // Hide loading and show results
                document.getElementById('loadingSpinner').style.display = 'none';
                document.getElementById('predictionResult').style.display = 'block';
            }, 1500); // Simulate API delay
        });
    });
</script>
@endsection
