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
    .input-form {
        margin-bottom: 2rem;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #145214;
    }
    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.3s;
    }
    .form-control:focus {
        border-color: #145214;
        outline: none;
    }
    .btn-submit {
        background-color: #145214;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .btn-submit:hover {
        background-color: #0e3a0e;
    }
    .result-card {
        background-color: rgba(255, 255, 255, 0.95);
        border-radius: 10px;
        padding: 1.5rem;
        margin-top: 2rem;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }
    .result-title {
        color: #145214;
        font-size: 1.3rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    .result-value {
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
        line-height: 1.6;
    }
    .table-responsive {
        overflow-x: auto;
    }
    .harvest-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1.5rem;
    }
    .harvest-table th, .harvest-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    .harvest-table th {
        background-color: #145214;
        color: white;
        font-weight: 600;
    }
    .harvest-table tr:nth-child(even) {
        background-color: rgba(20, 82, 20, 0.05);
    }
    .harvest-table tr:hover {
        background-color: rgba(20, 82, 20, 0.1);
    }
    .loading {
        display: none;
        text-align: center;
        padding: 1rem;
        color: #145214;
    }
    .spinner {
        border: 4px solid rgba(20, 82, 20, 0.1);
        border-radius: 50%;
        border-top: 4px solid #145214;
        width: 30px;
        height: 30px;
        animation: spin 1s linear infinite;
        margin: 0 auto;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    .soil-info {
        background-color: rgba(20, 82, 20, 0.1);
        padding: 1rem;
        border-radius: 8px;
        margin-top: 1rem;
    }
    .soil-info p {
        margin: 0.5rem 0;
    }
    .soil-info strong {
        color: #145214;
    }
    .location-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    .location-group {
        margin-bottom: 0;
    }
</style>

<div class="glass-card">
    <h1 class="welcome-title">Prediksi Panen</h1>

    <div class="dashboard-section">
        <div class="input-form">
            <form id="harvestPredictionForm">
                <div class="location-container">
                    <div class="form-group location-group">
                        <label for="province" class="form-label">Provinsi</label>
                        <select id="province" class="form-control" required>
                            <option value="">Pilih Provinsi</option>
                            <option value="jawa-barat">Jawa Barat</option>
                            <option value="jawa-tengah">Jawa Tengah</option>
                            <option value="jawa-timur">Jawa Timur</option>
                            <option value="sumatera-utara">Sumatera Utara</option>
                            <option value="bali">Bali</option>
                            <option value="kalimantan-tengah">Kalimantan Tengah</option>
                        </select>
                    </div>
                    
                    <div class="form-group location-group">
                        <label for="city" class="form-label">Kota/Kabupaten</label>
                        <select id="city" class="form-control" required disabled>
                            <option value="">Pilih Kota/Kabupaten</option>
                        </select>
                    </div>
                    
                    <div class="form-group location-group">
                        <label for="district" class="form-label">Kecamatan</label>
                        <select id="district" class="form-control" required disabled>
                            <option value="">Pilih Kecamatan</option>
                        </select>
                    </div>
                    
                    <div class="form-group location-group">
                        <label for="village" class="form-label">Desa/Kelurahan</label>
                        <select id="village" class="form-control" required disabled>
                            <option value="">Pilih Desa/Kelurahan</option>
                        </select>
                    </div>
                </div>
                
                <div id="soilInfoContainer" class="soil-info" style="display: none;">
                    <p><strong>Kondisi Tanah:</strong></p>
                    <p id="soilTypeDisplay">Jenis Tanah: -</p>
                    <p id="soilFertilityDisplay">Tingkat Kesuburan: -</p>
                    <p id="soilPhDisplay">pH Tanah: -</p>
                    <p id="soilMoistureDisplay">Kelembaban Tanah: -</p>
                </div>
                
                <div class="form-group">
                    <label for="plantType" class="form-label">Jenis Tanaman</label>
                    <select id="plantType" class="form-control" required>
                        <option value="">Pilih jenis tanaman</option>
                        <option value="padi">Padi</option>
                        <option value="jagung">Jagung</option>
                        <option value="kedelai">Kedelai</option>
                        <option value="cabai">Cabai</option>
                        <option value="tomat">Tomat</option>
                        <option value="tebu">Tebu</option>
                    </select>
                </div>
                
                <button type="submit" class="btn-submit">Prediksi Panen</button>
            </form>
        </div>
        
        <div class="loading" id="loadingIndicator">
            <div class="spinner"></div>
            <p>Memproses...</p>
        </div>
        
        <div id="predictionResult" style="display: none;">
            <div class="result-card">
                <h3 class="result-title">Hasil Prediksi Panen</h3>
                <div class="result-value">
                    <p><strong>Lokasi:</strong> <span id="resultLocation"></span></p>
                    <p><strong>Jenis Tanaman:</strong> <span id="resultPlant"></span></p>
                    <p><strong>Kondisi Tanah:</strong> <span id="resultSoil"></span></p>
                    <p><strong>Perkiraan Waktu Panen:</strong> <span id="resultHarvestTime"></span></p>
                </div>
                
                <h4 class="section-title">Rencana Perawatan Tanaman</h4>
                <div class="table-responsive">
                    <table class="harvest-table">
                        <thead>
                            <tr>
                                <th>Hari Ke-</th>
                                <th>Kegiatan</th>
                                <th>Kondisi Ideal</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody id="carePlanTable">
                            <!-- Konten tabel akan diisi oleh JavaScript -->
                        </tbody>
                    </table>
                </div>
                <div style="text-align: right; margin-top: 1rem;">
                    <button id="savePredictionBtn" class="btn-submit">Simpan Prediksi</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/locationDataFile.js') }}"></script>
<script src="{{ asset('js/plantDataFile.js') }}"></script>
<script>
    // Elemen DOM
    const provinceSelect = document.getElementById('province');
    const citySelect = document.getElementById('city');
    const districtSelect = document.getElementById('district');
    const villageSelect = document.getElementById('village');
    const soilInfoContainer = document.getElementById('soilInfoContainer');

    // Handler perubahan provinsi
    provinceSelect.addEventListener('change', function() {
        const provinceId = this.value;
        
        // Reset select bawahan
        citySelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
        districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
        villageSelect.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';
        soilInfoContainer.style.display = 'none';
        
        // Nonaktifkan select bawahan
        citySelect.disabled = true;
        districtSelect.disabled = true;
        villageSelect.disabled = true;
        
        if (provinceId && locationData[provinceId]) {
            citySelect.disabled = false;
            
            // Isi data kota/kabupaten
            const cities = locationData[provinceId].cities;
            for (const cityId in cities) {
                const option = document.createElement('option');
                option.value = cityId;
                option.textContent = cities[cityId].name;
                citySelect.appendChild(option);
            }
        }
    });

    // Handler perubahan kota/kabupaten
    citySelect.addEventListener('change', function() {
        const provinceId = provinceSelect.value;
        const cityId = this.value;
        
        // Reset select bawahan
        districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
        villageSelect.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';
        soilInfoContainer.style.display = 'none';
        
        // Nonaktifkan select bawahan
        districtSelect.disabled = true;
        villageSelect.disabled = true;
        
        if (provinceId && cityId && locationData[provinceId]?.cities[cityId]) {
            districtSelect.disabled = false;
            
            // Isi data kecamatan
            const districts = locationData[provinceId].cities[cityId].districts;
            for (const districtId in districts) {
                const option = document.createElement('option');
                option.value = districtId;
                option.textContent = districts[districtId].name;
                districtSelect.appendChild(option);
            }
        }
    });

    // Handler perubahan kecamatan
    districtSelect.addEventListener('change', function() {
        const provinceId = provinceSelect.value;
        const cityId = citySelect.value;
        const districtId = this.value;
        
        // Reset select bawahan
        villageSelect.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';
        soilInfoContainer.style.display = 'none';
        
        // Nonaktifkan select bawahan
        villageSelect.disabled = true;
        
        if (provinceId && cityId && districtId && 
            locationData[provinceId]?.cities[cityId]?.districts[districtId]) {
            villageSelect.disabled = false;
            
            // Isi data desa/kelurahan
            const villages = locationData[provinceId].cities[cityId].districts[districtId].villages;
            for (const villageId in villages) {
                const option = document.createElement('option');
                option.value = villageId;
                option.textContent = villages[villageId];
                villageSelect.appendChild(option);
            }
            
            // Tampilkan informasi tanah
            const soilData = locationData[provinceId].cities[cityId].districts[districtId].soilData;
            if (soilData) {
                document.getElementById('soilTypeDisplay').textContent = `Jenis Tanah: ${soilData.soilType}`;
                document.getElementById('soilFertilityDisplay').textContent = `Tingkat Kesuburan: ${soilData.fertilityDesc}`;
                document.getElementById('soilPhDisplay').textContent = `pH Tanah: ${soilData.soilPh}`;
                document.getElementById('soilMoistureDisplay').textContent = `Kelembaban Tanah: ${soilData.soilMoisture}`;
                soilInfoContainer.style.display = 'block';
            }
        }
    });

    // Fungsi untuk menggabungkan baris yang sama dalam rencana perawatan
    function gabungkanBarisSerupa(carePlan) {
        if (!carePlan || carePlan.length === 0) return [];
        
        const rencanaTergabung = [];
        let awalRange = carePlan[0].day;
        let aktivitasSaatIni = carePlan[0].activity;
        let kondisiSaatIni = carePlan[0].condition;
        let catatanSaatIni = carePlan[0].note;
        
        for (let i = 1; i < carePlan.length; i++) {
            const item = carePlan[i];
            
            if (item.activity === aktivitasSaatIni && 
                item.condition === kondisiSaatIni && 
                item.note === catatanSaatIni) {
                // Lanjutkan range saat ini
                continue;
            } else {
                // Akhiri range saat ini dan mulai yang baru
                rencanaTergabung.push({
                    day: awalRange === carePlan[i-1].day 
                        ? awalRange 
                        : `${awalRange}-${carePlan[i-1].day}`,
                    activity: aktivitasSaatIni,
                    condition: kondisiSaatIni,
                    note: catatanSaatIni
                });
                
                awalRange = item.day;
                aktivitasSaatIni = item.activity;
                kondisiSaatIni = item.condition;
                catatanSaatIni = item.note;
            }
        }
        
        // Tambahkan range terakhir
        rencanaTergabung.push({
            day: awalRange === carePlan[carePlan.length-1].day 
                ? awalRange 
                : `${awalRange}-${carePlan[carePlan.length-1].day}`,
            activity: aktivitasSaatIni,
            condition: kondisiSaatIni,
            note: catatanSaatIni
        });
        
        return rencanaTergabung;
    }

    // Handler submit form prediksi panen
    document.getElementById('harvestPredictionForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Tampilkan indikator loading
        document.getElementById('loadingIndicator').style.display = 'block';
        document.getElementById('predictionResult').style.display = 'none';
        
        // Ambil nilai form
        const provinceId = provinceSelect.value;
        const cityId = citySelect.value;
        const districtId = districtSelect.value;
        const villageId = villageSelect.value;
        const plantType = document.getElementById('plantType').value;
        
        // Validasi input
        if (!provinceId || !cityId || !districtId || !villageId || !plantType) {
            alert('Silakan lengkapi semua data lokasi dan pilih jenis tanaman');
            document.getElementById('loadingIndicator').style.display = 'none';
            return;
        }
        
        // Ambil kondisi tanah dari data lokasi
        const soilCondition = locationData[provinceId]?.cities[cityId]?.districts[districtId]?.soilData?.soilFertility || 'sedang';
        
        // Ambil nama lokasi
        const provinceName = locationData[provinceId].name;
        const cityName = locationData[provinceId].cities[cityId].name;
        const districtName = locationData[provinceId].cities[cityId].districts[districtId].name;
        const villageName = locationData[provinceId].cities[cityId].districts[districtId].villages[villageId];
        
        // Simulasi panggilan API (pada aplikasi nyata, ini akan menjadi panggilan API sebenarnya)
        setTimeout(function() {
            // Sembunyikan indikator loading
            document.getElementById('loadingIndicator').style.display = 'none';
            
            // Tampilkan hasil
            document.getElementById('resultLocation').textContent = `${villageName}, ${districtName}, ${cityName}, ${provinceName}`;
            document.getElementById('resultPlant').textContent = document.getElementById('plantType').options[document.getElementById('plantType').selectedIndex].text;
            
            // Tampilkan kondisi tanah dengan deskripsi
            const soilDesc = {
                'subur': 'Subur (Kaya nutrisi, cocok untuk berbagai tanaman)',
                'sedang': 'Sedang (Memerlukan pemupukan tambahan)',
                'kurang-subur': 'Kurang Subur (Perlu perlakuan khusus dan pemupukan intensif)'
            };
            document.getElementById('resultSoil').textContent = soilDesc[soilCondition];
            
            // Hasilkan prediksi berdasarkan input
            const prediction = generatePrediction(provinceId, plantType, soilCondition);
            document.getElementById('resultHarvestTime').textContent = prediction.harvestTime;
            
            // Gabungkan baris yang sama dalam rencana perawatan
            const rencanaTergabung = gabungkanBarisSerupa(prediction.carePlan);
            
            // Isi tabel rencana perawatan
            const tableBody = document.getElementById('carePlanTable');
            tableBody.innerHTML = '';
            
            rencanaTergabung.forEach(hari => {
                const baris = document.createElement('tr');
                
                const selHari = document.createElement('td');
                selHari.textContent = hari.day;
                baris.appendChild(selHari);
                
                const selAktivitas = document.createElement('td');
                selAktivitas.textContent = hari.activity;
                baris.appendChild(selAktivitas);
                
                const selKondisi = document.createElement('td');
                selKondisi.textContent = hari.condition;
                baris.appendChild(selKondisi);
                
                const selCatatan = document.createElement('td');
                selCatatan.textContent = hari.note;
                baris.appendChild(selCatatan);
                
                tableBody.appendChild(baris);
            });
            
            // Tampilkan hasil
            document.getElementById('predictionResult').style.display = 'block';
        }, 1500); // Simulasi delay API
    });
    
    // Fungsi untuk menghasilkan prediksi berdasarkan input
    function generatePrediction(region, plantType, soilCondition) {
        // This is mock data - in a real app, this would come from government API
        const predictions = {
            'padi': {
                'subur': {
                    harvestTime: '90-100 hari',
                    carePlan: generateRiceCarePlan('subur')
                },
                'sedang': {
                    harvestTime: '100-110 hari',
                    carePlan: generateRiceCarePlan('sedang')
                },
                'kurang-subur': {
                    harvestTime: '110-120 hari',
                    carePlan: generateRiceCarePlan('kurang-subur')
                }
            },
            'jagung': {
                'subur': {
                    harvestTime: '80-90 hari',
                    carePlan: generateCornCarePlan('subur')
                },
                'sedang': {
                    harvestTime: '90-100 hari',
                    carePlan: generateCornCarePlan('sedang')
                },
                'kurang-subur': {
                    harvestTime: '100-110 hari',
                    carePlan: generateCornCarePlan('kurang-subur')
                }
            },
            'kedelai': {
                'subur': {
                    harvestTime: '75-85 hari',
                    carePlan: generateSoybeanCarePlan('subur')
                },
                'sedang': {
                    harvestTime: '85-95 hari',
                    carePlan: generateSoybeanCarePlan('sedang')
                },
                'kurang-subur': {
                    harvestTime: '95-105 hari',
                    carePlan: generateSoybeanCarePlan('kurang-subur')
                }
            },
            'cabai': {
                'subur': {
                    harvestTime: '70-80 hari',
                    carePlan: generateChiliCarePlan('subur')
                },
                'sedang': {
                    harvestTime: '80-90 hari',
                    carePlan: generateChiliCarePlan('sedang')
                },
                'kurang-subur': {
                    harvestTime: '90-100 hari',
                    carePlan: generateChiliCarePlan('kurang-subur')
                }
            },
            'tomat': {
                'subur': {
                    harvestTime: '65-75 hari',
                    carePlan: generateTomatoCarePlan('subur')
                },
                'sedang': {
                    harvestTime: '75-85 hari',
                    carePlan: generateTomatoCarePlan('sedang')
                },
                'kurang-subur': {
                    harvestTime: '85-95 hari',
                    carePlan: generateTomatoCarePlan('kurang-subur')
                }
            },
            'tebu': {
                'subur': {
                    harvestTime: '330-360 hari',
                    carePlan: generateSugarcaneCarePlan('subur')
                },
                'sedang': {
                    harvestTime: '360-390 hari',
                    carePlan: generateSugarcaneCarePlan('sedang')
                },
                'kurang-subur': {
                    harvestTime: '390-420 hari',
                    carePlan: generateSugarcaneCarePlan('kurang-subur')
                }
            }
        };
        
        // Default to padi if plant type not in mock data
        const plantData = predictions[plantType] || predictions['padi'];
        return plantData[soilCondition] || plantData['subur'];
    }
    
    // Functions to generate care plans for different plants (same as before)
    function generateRiceCarePlan(soilCondition) {
        const days = soilCondition === 'subur' ? 100 : (soilCondition === 'sedang' ? 110 : 120);
        const plan = [];
        
        // Week 1-2: Preparation and planting
        for (let i = 1; i <= 14; i++) {
            plan.push({
                day: i,
                activity: i <= 7 ? 'Persiapan lahan' : 'Penanaman bibit',
                condition: 'Kelembaban tanah sedang',
                note: i <= 7 ? 'Pembajakan dan pengairan' : 'Bibit umur 21 hari'
            });
        }
        
        // Week 3-8: Growth phase
        for (let i = 15; i <= 56; i++) {
            const week = Math.floor((i-1)/7) + 1;
            plan.push({
                day: i,
                activity: 'Pemeliharaan',
                condition: 'Ketinggian air 2-5 cm',
                note: week >= 4 ? 'Pemupukan susulan' : 'Penyiangan gulma'
            });
        }
        
        // Week 9-14: Flowering to harvest
        for (let i = 57; i <= days; i++) {
            const week = Math.floor((i-1)/7) + 1;
            plan.push({
                day: i,
                activity: week >= 12 ? 'Persiapan panen' : 'Pengendalian hama',
                condition: 'Sinar matahari penuh',
                note: week >= 12 ? 'Pengeringan lahan' : 'Penyemprotan pestisida'
            });
        }
        
        return plan;
    }
    
    function generateCornCarePlan(soilCondition) {
        const days = soilCondition === 'subur' ? 90 : (soilCondition === 'sedang' ? 100 : 110);
        const plan = [];
        
        // Week 1-3: Planting
        for (let i = 1; i <= 21; i++) {
            plan.push({
                day: i,
                activity: i <= 7 ? 'Persiapan lahan' : 'Penanaman benih',
                condition: 'Tanah gembur',
                note: i <= 7 ? 'Pengolahan tanah' : 'Benih berkualitas'
            });
        }
        
        // Week 4-8: Growth phase
        for (let i = 22; i <= 56; i++) {
            const week = Math.floor((i-1)/7) + 1;
            plan.push({
                day: i,
                activity: 'Pemeliharaan',
                condition: 'Cukup air',
                note: week >= 5 ? 'Pemupukan susulan' : 'Penyiangan'
            });
        }
        
        // Week 9-13: Flowering to harvest
        for (let i = 57; i <= days; i++) {
            const week = Math.floor((i-1)/7) + 1;
            plan.push({
                day: i,
                activity: week >= 12 ? 'Panen' : 'Pengendalian hama',
                condition: 'Sinar matahari penuh',
                note: week >= 12 ? 'Pemanenan biji' : 'Pemantauan tongkol'
            });
        }
        
        return plan;
    }
    
    function generateSoybeanCarePlan(soilCondition) {
        const days = soilCondition === 'subur' ? 85 : (soilCondition === 'sedang' ? 95 : 105);
        const plan = [];
        
        // Week 1-2: Preparation and planting
        for (let i = 1; i <= 14; i++) {
            plan.push({
                day: i,
                activity: i <= 7 ? 'Persiapan lahan' : 'Penanaman benih',
                condition: 'Tanah lembab',
                note: i <= 7 ? 'Pengolahan tanah' : 'Jarak tanam 30x20 cm'
            });
        }
        
        // Week 3-6: Growth phase
        for (let i = 15; i <= 42; i++) {
            const week = Math.floor((i-1)/7) + 1;
            plan.push({
                day: i,
                activity: 'Pemeliharaan',
                condition: 'Kelembaban sedang',
                note: week >= 4 ? 'Pemupukan susulan' : 'Penyiangan'
            });
        }
        
        // Week 7-12: Flowering to harvest
        for (let i = 43; i <= days; i++) {
            const week = Math.floor((i-1)/7) + 1;
            plan.push({
                day: i,
                activity: week >= 10 ? 'Panen' : 'Pengendalian hama',
                condition: 'Sinar matahari cukup',
                note: week >= 10 ? 'Panen saat polong matang' : 'Penyemprotan pestisida'
            });
        }
        
        return plan;
    }
    
    function generateChiliCarePlan(soilCondition) {
        const days = soilCondition === 'subur' ? 80 : (soilCondition === 'sedang' ? 90 : 100);
        const plan = [];
        
        // Week 1-3: Preparation and planting
        for (let i = 1; i <= 21; i++) {
            plan.push({
                day: i,
                activity: i <= 7 ? 'Persiapan lahan' : 'Penanaman bibit',
                condition: 'Tanah gembur',
                note: i <= 7 ? 'Pengolahan tanah' : 'Bibit umur 25-30 hari'
            });
        }
        
        // Week 4-8: Growth phase
        for (let i = 22; i <= 56; i++) {
            const week = Math.floor((i-1)/7) + 1;
            plan.push({
                day: i,
                activity: 'Pemeliharaan',
                condition: 'Kelembaban sedang',
                note: week >= 5 ? 'Pemupukan susulan' : 'Penyiangan gulma'
            });
        }
        
        // Week 9-12: Flowering to harvest
        for (let i = 57; i <= days; i++) {
            const week = Math.floor((i-1)/7) + 1;
            plan.push({
                day: i,
                activity: week >= 10 ? 'Panen bertahap' : 'Pengendalian hama',
                condition: 'Sinar matahari penuh',
                note: week >= 10 ? 'Panen saat buah merah 80%' : 'Penyemprotan pestisida'
            });
        }
        
        return plan;
    }
    
    function generateTomatoCarePlan(soilCondition) {
        const days = soilCondition === 'subur' ? 75 : (soilCondition === 'sedang' ? 85 : 95);
        const plan = [];
        
        // Week 1-3: Preparation and planting
        for (let i = 1; i <= 21; i++) {
            plan.push({
                day: i,
                activity: i <= 7 ? 'Persiapan lahan' : 'Penanaman bibit',
                condition: 'Tanah gembur',
                note: i <= 7 ? 'Pengolahan tanah' : 'Bibit umur 21-25 hari'
            });
        }
        
        // Week 4-8: Growth phase
        for (let i = 22; i <= 56; i++) {
            const week = Math.floor((i-1)/7) + 1;
            plan.push({
                day: i,
                activity: 'Pemeliharaan',
                condition: 'Kelembaban sedang',
                note: week >= 5 ? 'Pemupukan susulan' : 'Penyiangan gulma'
            });
        }
        
        // Week 9-12: Flowering to harvest
        for (let i = 57; i <= days; i++) {
            const week = Math.floor((i-1)/7) + 1;
            plan.push({
                day: i,
                activity: week >= 10 ? 'Panen bertahap' : 'Pengendalian hama',
                condition: 'Sinar matahari penuh',
                note: week >= 10 ? 'Panen saat buah matang' : 'Penyemprotan pestisida'
            });
        }
        
        return plan;
    }
    
    function generateSugarcaneCarePlan(soilCondition) {
        const days = soilCondition === 'subur' ? 360 : (soilCondition === 'sedang' ? 390 : 420);
        const plan = [];
        
        // Month 1-3: Preparation and planting
        for (let i = 1; i <= 90; i++) {
            plan.push({
                day: i,
                activity: i <= 30 ? 'Persiapan lahan' : 'Penanaman stek',
                condition: 'Tanah gembur',
                note: i <= 30 ? 'Pengolahan tanah intensif' : 'Stek batang berkualitas'
            });
        }
        
        // Month 4-9: Growth phase
        for (let i = 91; i <= 270; i++) {
            const month = Math.floor((i-1)/30) + 1;
            plan.push({
                day: i,
                activity: 'Pemeliharaan',
                condition: 'Cukup air',
                note: month >= 6 ? 'Pemupukan susulan' : 'Penyiangan gulma'
            });
        }
        
        // Month 10-14: Maturation phase
        for (let i = 271; i <= days; i++) {
            const month = Math.floor((i-1)/30) + 1;
            plan.push({
                day: i,
                activity: month >= 12 ? 'Persiapan panen' : 'Pengendalian hama',
                condition: 'Sinar matahari penuh',
                note: month >= 12 ? 'Pengeringan lahan' : 'Pemantauan pertumbuhan'
            });
        }
        
        return plan;
    }

    // Handler tombol simpan prediksi
    document.getElementById('savePredictionBtn').addEventListener('click', function() {
        // Ambil semua data yang akan disimpan
        const predictionData = {
            location: document.getElementById('resultLocation').textContent,
            plant: document.getElementById('resultPlant').textContent,
            soil: document.getElementById('resultSoil').textContent,
            harvestTime: document.getElementById('resultHarvestTime').textContent,
            carePlan: Array.from(document.querySelectorAll('#carePlanTable tr')).map(row => ({
                day: row.cells[0].textContent,
                activity: row.cells[1].textContent,
                condition: row.cells[2].textContent,
                note: row.cells[3].textContent
            })),
            predictionDate: new Date().toISOString()
        };

        // Kirim data ke server untuk disimpan
        fetch('/api/save-prediction', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(predictionData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Prediksi berhasil disimpan!');
                // Redirect ke halaman history jika diperlukan
                window.location.href = '/history';
            } else {
                alert('Gagal menyimpan prediksi: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menyimpan prediksi');
        });
    });
    
    document.getElementById('savePredictionBtn').addEventListener('click', function() {
        const predictionData = {
            location: document.getElementById('resultLocation').innerText,
            plant: document.getElementById('resultPlant').innerText,
            soil: document.getElementById('resultSoil').innerText,
            harvestTime: document.getElementById('resultHarvestTime').innerText,
            carePlan: []
        };

        // Ambil data dari tabel
        document.querySelectorAll('#carePlanTable tr').forEach(row => {
            predictionData.carePlan.push({
                day: row.cells[0].innerText,
                activity: row.cells[1].innerText,
                condition: row.cells[2].innerText,
                note: row.cells[3].innerText
            });
        });

        // Kirim ke backend
        fetch('/save-prediction', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(predictionData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '/history'; // Redirect ke history
            }
        });
    });
</script>
@endsection