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
</style>

<div class="glass-card">
    <h1 class="welcome-title">Prediksi Panen</h1>

    <div class="dashboard-section">
        <div class="input-form">
            <form id="harvestPredictionForm">
                <div class="form-group">
                    <label for="region" class="form-label">Daerah Pertanian</label>
                    <select id="region" class="form-control" required>
                        <option value="">Pilih daerah</option>
                        <option value="jawa-barat">Jawa Barat</option>
                        <option value="jawa-tengah">Jawa Tengah</option>
                        <option value="jawa-timur">Jawa Timur</option>
                        <option value="sumatera-utara">Sumatera Utara</option>
                        <option value="bali">Bali</option>
                        <option value="kalimantan-tengah">Kalimantan Tengah</option>
                    </select>
                </div>
                
                <div id="soilInfoContainer" class="soil-info" style="display: none;">
                    <p><strong>Kondisi Tanah Otomatis Terdeteksi:</strong></p>
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
            <p>Mengambil data prediksi dari API pemerintah...</p>
        </div>
        
        <div id="predictionResult" style="display: none;">
            <div class="result-card">
                <h3 class="result-title">Hasil Prediksi Panen</h3>
                <div class="result-value">
                    <p><strong>Daerah:</strong> <span id="resultRegion"></span></p>
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
                            <!-- Table content will be filled by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Region data with automatic soil conditions (simulated from government API)
    const regionData = {
        'jawa-barat': {
            name: 'Jawa Barat',
            soilType: 'Latosol',
            soilFertility: 'subur',
            soilPh: '5.5 - 6.5',
            soilMoisture: 'Tinggi',
            fertilityDesc: 'Sangat subur dengan kandungan organik tinggi, cocok untuk berbagai tanaman'
        },
        'jawa-tengah': {
            name: 'Jawa Tengah',
            soilType: 'Grumusol',
            soilFertility: 'sedang',
            soilPh: '6.0 - 7.0',
            soilMoisture: 'Sedang',
            fertilityDesc: 'Kesuburan sedang, membutuhkan pupuk tambahan untuk hasil optimal'
        },
        'jawa-timur': {
            name: 'Jawa Timur',
            soilType: 'Regosol',
            soilFertility: 'kurang-subur',
            soilPh: '6.5 - 7.5',
            soilMoisture: 'Rendah',
            fertilityDesc: 'Tanah kurang subur, membutuhkan pengolahan dan pemupukan intensif'
        },
        'sumatera-utara': {
            name: 'Sumatera Utara',
            soilType: 'Andosol',
            soilFertility: 'subur',
            soilPh: '5.0 - 6.0',
            soilMoisture: 'Sangat Tinggi',
            fertilityDesc: 'Tanah vulkanik yang sangat subur, kaya mineral'
        },
        'bali': {
            name: 'Bali',
            soilType: 'Latosol',
            soilFertility: 'subur',
            soilPh: '5.5 - 6.5',
            soilMoisture: 'Tinggi',
            fertilityDesc: 'Tanah subur dengan irigasi baik, cocok untuk tanaman pangan'
        },
        'kalimantan-tengah': {
            name: 'Kalimantan Tengah',
            soilType: 'Podzolik',
            soilFertility: 'kurang-subur',
            soilPh: '4.5 - 5.5',
            soilMoisture: 'Sangat Tinggi',
            fertilityDesc: 'Tanah masam, membutuhkan pengapuran dan pemupukan khusus'
        }
    };

    // Listen for region selection changes
    document.getElementById('region').addEventListener('change', function() {
        const selectedRegion = this.value;
        
        if (selectedRegion && regionData[selectedRegion]) {
            const region = regionData[selectedRegion];
            
            // Display soil information
            document.getElementById('soilInfoContainer').style.display = 'block';
            document.getElementById('soilTypeDisplay').textContent = `Jenis Tanah: ${region.soilType}`;
            document.getElementById('soilFertilityDisplay').textContent = `Tingkat Kesuburan: ${region.fertilityDesc}`;
            document.getElementById('soilPhDisplay').textContent = `pH Tanah: ${region.soilPh}`;
            document.getElementById('soilMoistureDisplay').textContent = `Kelembaban Tanah: ${region.soilMoisture}`;
        } else {
            document.getElementById('soilInfoContainer').style.display = 'none';
        }
    });

    document.getElementById('harvestPredictionForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show loading indicator
        document.getElementById('loadingIndicator').style.display = 'block';
        document.getElementById('predictionResult').style.display = 'none';
        
        // Get form values
        const region = document.getElementById('region').value;
        const plantType = document.getElementById('plantType').value;
        
        if (!region || !plantType) {
            alert('Silakan pilih daerah dan jenis tanaman terlebih dahulu');
            document.getElementById('loadingIndicator').style.display = 'none';
            return;
        }
        
        // Get soil condition from region data
        const soilCondition = regionData[region]?.soilFertility || 'sedang';
        
        // Simulate API call (in a real app, this would be an actual API call)
        setTimeout(function() {
            // Hide loading indicator
            document.getElementById('loadingIndicator').style.display = 'none';
            
            // Display results
            document.getElementById('resultRegion').textContent = regionData[region].name;
            document.getElementById('resultPlant').textContent = document.getElementById('plantType').options[document.getElementById('plantType').selectedIndex].text;
            
            // Display soil condition with description
            const soilDesc = {
                'subur': 'Subur (Kaya nutrisi, cocok untuk berbagai tanaman)',
                'sedang': 'Sedang (Memerlukan pemupukan tambahan)',
                'kurang-subur': 'Kurang Subur (Perlu perlakuan khusus dan pemupukan intensif)'
            };
            document.getElementById('resultSoil').textContent = soilDesc[soilCondition];
            
            // Generate prediction based on inputs
            const prediction = generatePrediction(region, plantType, soilCondition);
            document.getElementById('resultHarvestTime').textContent = prediction.harvestTime;
            
            // Fill care plan table
            const tableBody = document.getElementById('carePlanTable');
            tableBody.innerHTML = '';
            
            prediction.carePlan.forEach(day => {
                const row = document.createElement('tr');
                
                const dayCell = document.createElement('td');
                dayCell.textContent = day.day;
                row.appendChild(dayCell);
                
                const activityCell = document.createElement('td');
                activityCell.textContent = day.activity;
                row.appendChild(activityCell);
                
                const conditionCell = document.createElement('td');
                conditionCell.textContent = day.condition;
                row.appendChild(conditionCell);
                
                const noteCell = document.createElement('td');
                noteCell.textContent = day.note;
                row.appendChild(noteCell);
                
                tableBody.appendChild(row);
            });
            
            // Show results
            document.getElementById('predictionResult').style.display = 'block';
        }, 1500); // Simulate API delay
    });
    
    // Function to generate prediction based on inputs
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
    
    // Functions to generate care plans for different plants
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
</script>
@endsection
