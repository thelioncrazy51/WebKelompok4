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
                            <!-- Table content will be filled by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Location data hierarchy (simulated from government API)
    const locationData = {
        'jawa-barat': {
            name: 'Jawa Barat',
            cities: {
                'bandung': {
                    name: 'Kota Bandung',
                    districts: {
                        'bandung-kulon': {
                            name: 'Bandung Kulon',
                            villages: {
                                'cirobon': 'Cirobon',
                                'cibuntu': 'Cibuntu',
                                'gempolsari': 'Gempolsari',
                                'kebonjeruk': 'Kebonjeruk',
                                'maleber': 'Maleber'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Sangat subur dengan kandungan organik tinggi'
                            }
                        },
                        'bandung-wetan': {
                            name: 'Bandung Wetan',
                            villages: {
                                'tamansari': 'Tamansari',
                                'citarum': 'Citarum',
                                'balonggede': 'Balonggede',
                                'braga': 'Braga',
                                'kebonpisang': 'Kebonpisang'
                            },
                            soilData: {
                                soilType: 'Andosol',
                                soilFertility: 'subur',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah vulkanik yang subur'
                            }
                        },
                        'cibeunying-kidul': {
                            name: 'Cibeunying Kidul',
                            villages: {
                                'cigadung': 'Cigadung',
                                'cihaurgeulis': 'Cihaurgeulis',
                                'cicadas': 'Cicadas',
                                'sukaluyu': 'Sukaluyu'
                            },
                            soilData: {
                                soilType: 'Regosol',
                                soilFertility: 'sedang',
                                soilPh: '6.0 - 6.8',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah berpasir dengan kesuburan sedang'
                            }
                        }
                    }
                },
                'sumedang': {
                    name: 'Kabupaten Sumedang',
                    districts: {
                        'sumedang-selatan': {
                            name: 'Sumedang Selatan',
                            villages: {
                                'cimanggung': 'Cimanggung',
                                'cikahuripan': 'Cikahuripan',
                                'citali': 'Citali',
                                'cileles': 'Cileles',
                                'jatiroke': 'Jatiroke'
                            },
                            soilData: {
                                soilType: 'Regosol',
                                soilFertility: 'sedang',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Kesuburan sedang, cocok untuk tanaman pangan'
                            }
                        },
                        'tanjungkerta': {
                            name: 'Tanjungkerta',
                            villages: {
                                'tanjungkerta': 'Tanjungkerta',
                                'mekarjaya': 'Mekarjaya',
                                'sukamenak': 'Sukamenak',
                                'sukamulya': 'Sukamulya',
                                'sukaraja': 'Sukaraja'
                            },
                            soilData: {
                                soilType: 'Grumusol',
                                soilFertility: 'kurang-subur',
                                soilPh: '6.5 - 7.5',
                                soilMoisture: 'Rendah',
                                fertilityDesc: 'Memerlukan pengolahan tanah khusus'
                            }
                        },
                        'jatinangor': {
                            name: 'Jatinangor',
                            villages: {
                                'hegarmanah': 'Hegarmanah',
                                'sayang': 'Sayang',
                                'cikeruh': 'Cikeruh',
                                'cileles': 'Cileles',
                                'cibeusi': 'Cibeusi'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.8 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah subur bekas kawasan perkebunan'
                            }
                        }
                    }
                },
                'ciamis': {
                    name: 'Kabupaten Ciamis',
                    districts: {
                        'ciamis': {
                            name: 'Ciamis',
                            villages: {
                                'ciamis': 'Ciamis',
                                'benteng': 'Benteng',
                                'cijeungjing': 'Cijeungjing',
                                'kertasari': 'Kertasari'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah subur bekas sawah'
                            }
                        },
                        'panjalu': {
                            name: 'Panjalu',
                            villages: {
                                'panjalu': 'Panjalu',
                                'kawali': 'Kawali',
                                'cipaku': 'Cipaku',
                                'janggala': 'Janggala'
                            },
                            soilData: {
                                soilType: 'Andosol',
                                soilFertility: 'subur',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah vulkanik sangat subur'
                            }
                        }
                    }
                }
            }
        },
        'jawa-tengah': {
            name: 'Jawa Tengah',
            cities: {
                'semarang': {
                    name: 'Kota Semarang',
                    districts: {
                        'semarang-barat': {
                            name: 'Semarang Barat',
                            villages: {
                                'bojongsalaman': 'Bojongsalaman',
                                'tambakharjo': 'Tambakharjo',
                                'kembangarum': 'Kembangarum',
                                'krobokan': 'Krobokan',
                                'tanjungmas': 'Tanjungmas'
                            },
                            soilData: {
                                soilType: 'Aluvial',
                                soilFertility: 'subur',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah endapan sungai yang subur'
                            }
                        },
                        'semarang-selatan': {
                            name: 'Semarang Selatan',
                            villages: {
                                'bulustalan': 'Bulustalan',
                                'barusari': 'Barusari',
                                'randusari': 'Randusari',
                                'mugassari': 'Mugassari'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.8 - 6.5',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah subur untuk perkebunan'
                            }
                        }
                    }
                },
                'magelang': {
                    name: 'Kabupaten Magelang',
                    districts: {
                        'salaman': {
                            name: 'Salaman',
                            villages: {
                                'kalirejo': 'Kalirejo',
                                'salamkanci': 'Salamkanci',
                                'ngargoretno': 'Ngargoretno',
                                'banjarharjo': 'Banjarharjo',
                                'jebengsari': 'Jebengsari'
                            },
                            soilData: {
                                soilType: 'Andosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah vulkanik sangat subur'
                            }
                        },
                        'muntilan': {
                            name: 'Muntilan',
                            villages: {
                                'muntilan': 'Muntilan',
                                'pucungrejo': 'Pucungrejo',
                                'adikarto': 'Adikarto',
                                'gunungpring': 'Gunungpring'
                            },
                            soilData: {
                                soilType: 'Regosol',
                                soilFertility: 'sedang',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah berpasir dengan kesuburan sedang'
                            }
                        }
                    }
                },
                'solo': {
                    name: 'Kota Surakarta',
                    districts: {
                        'laweyan': {
                            name: 'Laweyan',
                            villages: {
                                'laweyan': 'Laweyan',
                                'sondakan': 'Sondakan',
                                'pajang': 'Pajang',
                                'penumping': 'Penumping'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah subur untuk perkebunan'
                            }
                        },
                        'pasar-kliwon': {
                            name: 'Pasar Kliwon',
                            villages: {
                                'pasar-kliwon': 'Pasar Kliwon',
                                'gajahan': 'Gajahan',
                                'kauman': 'Kauman',
                                'joyosuran': 'Joyosuran'
                            },
                            soilData: {
                                soilType: 'Aluvial',
                                soilFertility: 'subur',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah endapan sungai yang subur'
                            }
                        }
                    }
                }
            }
        }
        'jawa-timur': {
            name: 'Jawa Timur',
            cities: {
                'surabaya': {
                    name: 'Kota Surabaya',
                    districts: {
                        'genteng': {
                            name: 'Genteng',
                            villages: {
                                'genteng': 'Genteng',
                                'ketabang': 'Ketabang',
                                'peneleh': 'Peneleh',
                                'embongkaliasin': 'Embong Kaliasin'
                            },
                            soilData: {
                                soilType: 'Aluvial',
                                soilFertility: 'subur',
                                soilPh: '6.5 - 7.5',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah endapan sungai yang subur'
                            }
                        },
                        'gubeng': {
                            name: 'Gubeng',
                            villages: {
                                'gubeng': 'Gubeng',
                                'airlangga': 'Airlangga',
                                'baratajaya': 'Baratajaya',
                                'mojo': 'Mojo'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'sedang',
                                soilPh: '6.0 - 6.8',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah dengan kesuburan sedang'
                            }
                        }
                    }
                },
                'malang': {
                    name: 'Kota Malang',
                    districts: {
                        'klojen': {
                            name: 'Klojen',
                            villages: {
                                'kauman': 'Kauman',
                                'kiduldalem': 'Kiduldalem',
                                'samaan': 'Samaan',
                                'sukoharjo': 'Sukoharjo'
                            },
                            soilData: {
                                soilType: 'Andosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah vulkanik subur'
                            }
                        },
                        'lowokwaru': {
                            name: 'Lowokwaru',
                            villages: {
                                'merjosari': 'Merjosari',
                                'tulusrejo': 'Tulusrejo',
                                'tunggulwulung': 'Tunggulwulung',
                                'tasikmadu': 'Tasikmadu'
                            },
                            soilData: {
                                soilType: 'Regosol',
                                soilFertility: 'sedang',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah berpasir dengan kesuburan sedang'
                            }
                        }
                    }
                }
            }
        },
        'bali': {
            name: 'Bali',
            cities: {
                'denpasar': {
                    name: 'Kota Denpasar',
                    districts: {
                        'denpasar-selatan': {
                            name: 'Denpasar Selatan',
                            villages: {
                                'padangsambian': 'Padangsambian',
                                'pemogan': 'Pemogan',
                                'sanur': 'Sanur',
                                'serangan': 'Serangan'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah subur untuk pertanian'
                            }
                        },
                        'denpasar-timur': {
                            name: 'Denpasar Timur',
                            villages: {
                                'kesiman': 'Kesiman',
                                'penatih': 'Penatih',
                                'sumerta': 'Sumerta',
                                'tembau': 'Tembau'
                            },
                            soilData: {
                                soilType: 'Andosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah vulkanik subur'
                            }
                        }
                    }
                },
                'badung': {
                    name: 'Kabupaten Badung',
                    districts: {
                        'kuta': {
                            name: 'Kuta',
                            villages: {
                                'kuta': 'Kuta',
                                'legian': 'Legian',
                                'seminyak': 'Seminyak',
                                'tuban': 'Tuban'
                            },
                            soilData: {
                                soilType: 'Regosol',
                                soilFertility: 'sedang',
                                soilPh: '6.5 - 7.5',
                                soilMoisture: 'Rendah',
                                fertilityDesc: 'Tanah berpasir pantai'
                            }
                        },
                        'mengwi': {
                            name: 'Mengwi',
                            villages: {
                                'mengwi': 'Mengwi',
                                'abiansemal': 'Abiansemal',
                                'sading': 'Sading',
                                'kapal': 'Kapal'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah subur untuk pertanian'
                            }
                        }
                    }
                }
            }
        },
        'sumatera-utara': {
            name: 'Sumatera Utara',
            cities: {
                'medan': {
                    name: 'Kota Medan',
                    districts: {
                        'medan-barat': {
                            name: 'Medan Barat',
                            villages: {
                                'seirampah': 'Sei Rampah',
                                'glugur': 'Glugur',
                                'petisah': 'Petisah',
                                'padangbulan': 'Padang Bulan'
                            },
                            soilData: {
                                soilType: 'Organosol',
                                soilFertility: 'subur',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah gambut yang subur'
                            }
                        },
                        'medan-selatan': {
                            name: 'Medan Selatan',
                            villages: {
                                'amplas': 'Amplas',
                                'medan-estate': 'Medan Estate',
                                'teladan': 'Teladan',
                                'seimedang': 'Sei Medan'
                            },
                            soilData: {
                                soilType: 'Aluvial',
                                soilFertility: 'subur',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah endapan sungai yang subur'
                            }
                        }
                    }
                },
                'deli-serdang': {
                    name: 'Kabupaten Deli Serdang',
                    districts: {
                        'lubuk-pakam': {
                            name: 'Lubuk Pakam',
                            villages: {
                                'lubuk-pakam': 'Lubuk Pakam',
                                'bandar-klippa': 'Bandar Klippa',
                                'pagar-merbau': 'Pagar Merbau',
                                'dolok-masango': 'Dolok Masango'
                            },
                            soilData: {
                                soilType: 'Andosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah vulkanik subur'
                            }
                        },
                        'galang': {
                            name: 'Galang',
                            villages: {
                                'galang': 'Galang',
                                'simpang-tiga': 'Simpang Tiga',
                                'paya-gali': 'Paya Gali',
                                'bangun-sari': 'Bangun Sari'
                            },
                            soilData: {
                                soilType: 'Podsolik',
                                soilFertility: 'sedang',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah dengan kesuburan sedang'
                            }
                        }
                    }
                }
            }
        },
        'sulawesi-selatan': {
            name: 'Sulawesi Selatan',
            cities: {
                'makassar': {
                    name: 'Kota Makassar',
                    districts: {
                        'makassar': {
                            name: 'Makassar',
                            villages: {
                                'mariso': 'Mariso',
                                'mamajang': 'Mamajang',
                                'wajo': 'Wajo',
                                'bontoala': 'Bontoala'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah subur untuk perkebunan'
                            }
                        },
                        'ujung-pandang': {
                            name: 'Ujung Pandang',
                            villages: {
                                'losari': 'Losari',
                                'maloku': 'Maloku',
                                'pattunuang': 'Pattunuang',
                                'bulogading': 'Bulo Gading'
                            },
                            soilData: {
                                soilType: 'Regosol',
                                soilFertility: 'sedang',
                                soilPh: '6.5 - 7.5',
                                soilMoisture: 'Rendah',
                                fertilityDesc: 'Tanah berpasir dengan kesuburan sedang'
                            }
                        }
                    }
                },
                'bone': {
                    name: 'Kabupaten Bone',
                    districts: {
                        'watampone': {
                            name: 'Watampone',
                            villages: {
                                'watampone': 'Watampone',
                                'ta': 'Ta',
                                'umpungeng': 'Umpungeng',
                                'cina': 'Cina'
                            },
                            soilData: {
                                soilType: 'Grumusol',
                                soilFertility: 'kurang-subur',
                                soilPh: '6.5 - 7.5',
                                soilMoisture: 'Rendah',
                                fertilityDesc: 'Memerlukan pengolahan tanah khusus'
                            }
                        },
                        'barebbo': {
                            name: 'Barebbo',
                            villages: {
                                'barebbo': 'Barebbo',
                                'cinnong': 'Cinnong',
                                'pancaitana': 'Pancaitana',
                                'awang-awang': 'Awang-awang'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah subur untuk pertanian'
                            }
                        }
                    }
                }
            }
        }
        'aceh': {
            name: 'Aceh',
            cities: {
                'banda-aceh': {
                    name: 'Kota Banda Aceh',
                    districts: {
                        'syiah-kuala': {
                            name: 'Syiah Kuala',
                            villages: {
                                'jeulingke': 'Jeulingke',
                                'ipek': 'Ipeh',
                                'deah-raya': 'Deah Raya',
                                'alue-naga': 'Alue Naga'
                            },
                            soilData: {
                                soilType: 'Alluvial',
                                soilFertility: 'subur',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah endapan sungai yang subur'
                            }
                        },
                        'kuta-alam': {
                            name: 'Kuta Alam',
                            villages: {
                                'peunayong': 'Peunayong',
                                'kuta-alam': 'Kuta Alam',
                                'meuraxa': 'Meuraxa',
                                'lampaseh': 'Lampaseh'
                            },
                            soilData: {
                                soilType: 'Organosol',
                                soilFertility: 'sedang',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah gambut dengan kesuburan sedang'
                            }
                        }
                    }
                },
                'aceh-besar': {
                    name: 'Kabupaten Aceh Besar',
                    districts: {
                        'krueng-barona-jaya': {
                            name: 'Krueng Barona Jaya',
                            villages: {
                                'lambaro-angon': 'Lambaro Angon',
                                'lampineung': 'Lampineung',
                                'lampoh-daya': 'Lampoh Daya',
                                'lampot-daya': 'Lampot Daya'
                            },
                            soilData: {
                                soilType: 'Andosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah vulkanik subur'
                            }
                        },
                        'ingin-jaya': {
                            name: 'Ingin Jaya',
                            villages: {
                                'lambaro-sukon': 'Lambaro Sukon',
                                'lambaro-tunong': 'Lambaro Tunong',
                                'leupung-cut': 'Leupung Cut',
                                'leupung-rayeuk': 'Leupung Rayeuk'
                            },
                            soilData: {
                                soilType: 'Regosol',
                                soilFertility: 'sedang',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah berpasir dengan kesuburan sedang'
                            }
                        }
                    }
                }
            }
        },
        'sumatera-barat': {
            name: 'Sumatera Barat',
            cities: {
                'padang': {
                    name: 'Kota Padang',
                    districts: {
                        'koto-tangah': {
                            name: 'Koto Tangah',
                            villages: {
                                'balai-gadang': 'Balai Gadang',
                                'batipuh-panjang': 'Batipuh Panjang',
                                'bungo-tanjuang': 'Bungo Tanjuang',
                                'lubuk-buayo': 'Lubuk Buayo'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah subur untuk pertanian'
                            }
                        },
                        'lubuk-begalung': {
                            name: 'Lubuk Begalung',
                            villages: {
                                'gurun-laweh': 'Gurun Laweh',
                                'koto-luak': 'Koto Luak',
                                'pampangan': 'Pampangan',
                                'parak-laweh': 'Parak Laweh'
                            },
                            soilData: {
                                soilType: 'Andosol',
                                soilFertility: 'subur',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah vulkanik subur'
                            }
                        }
                    }
                },
                'tanah-datar': {
                    name: 'Kabupaten Tanah Datar',
                    districts: {
                        'batusangkar': {
                            name: 'Batusangkar',
                            villages: {
                                'batusangkar': 'Batusangkar',
                                'lima-kaum': 'Lima Kaum',
                                'parambahan': 'Parambahan',
                                'sumpur-kudus': 'Sumpur Kudus'
                            },
                            soilData: {
                                soilType: 'Andosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah vulkanik subur'
                            }
                        },
                        'pariangan': {
                            name: 'Pariangan',
                            villages: {
                                'pariangan': 'Pariangan',
                                'sawah-tangah': 'Sawah Tangah',
                                'situmbuk': 'Situmbuk',
                                'tabek': 'Tabek'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah subur untuk sawah'
                            }
                        }
                    }
                }
            }
        },
        'riau': {
            name: 'Riau',
            cities: {
                'pekanbaru': {
                    name: 'Kota Pekanbaru',
                    districts: {
                        'sail': {
                            name: 'Sail',
                            villages: {
                                'sail': 'Sail',
                                'sukamaju': 'Sukamaju',
                                'rejosari': 'Rejosari',
                                'sukamulya': 'Sukamulya'
                            },
                            soilData: {
                                soilType: 'Organosol',
                                soilFertility: 'subur',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah gambut yang subur'
                            }
                        },
                        'tenayan-raya': {
                            name: 'Tenayan Raya',
                            villages: {
                                'kulim': 'Kulim',
                                'wono-sari': 'Wono Sari',
                                'bencah-lesung': 'Bencah Lesung',
                                'tahfidz-qu': 'Tahfidz Qu'
                            },
                            soilData: {
                                soilType: 'Alluvial',
                                soilFertility: 'subur',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah endapan sungai yang subur'
                            }
                        }
                    }
                },
                'siak': {
                    name: 'Kabupaten Siak',
                    districts: {
                        'siak': {
                            name: 'Siak',
                            villages: {
                                'siak': 'Siak',
                                'kampung-rempak': 'Kampung Rempak',
                                'kampung-tengah': 'Kampung Tengah',
                                'sungai-apit': 'Sungai Apit'
                            },
                            soilData: {
                                soilType: 'Organosol',
                                soilFertility: 'subur',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah gambut yang subur'
                            }
                        },
                        'kandis': {
                            name: 'Kandis',
                            villages: {
                                'kandis': 'Kandis',
                                'simpang-belutu': 'Simpang Belutu',
                                'belutu': 'Belutu',
                                'sam-sam': 'Sam Sam'
                            },
                            soilData: {
                                soilType: 'Podsolik',
                                soilFertility: 'sedang',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah dengan kesuburan sedang'
                            }
                        }
                    }
                }
            }
        },
        'jambi': {
            name: 'Jambi',
            cities: {
                'jambi': {
                    name: 'Kota Jambi',
                    districts: {
                        'jambi-selatan': {
                            name: 'Jambi Selatan',
                            villages: {
                                'tanjung-pinang': 'Tanjung Pinang',
                                'pakuan-baru': 'Pakuan Baru',
                                'the-hok': 'The Hok',
                                'wijaya-pura': 'Wijaya Pura'
                            },
                            soilData: {
                                soilType: 'Alluvial',
                                soilFertility: 'subur',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah endapan sungai yang subur'
                            }
                        },
                        'kotabaru': {
                            name: 'Kotabaru',
                            villages: {
                                'kotabaru': 'Kotabaru',
                                'solok-sipin': 'Solok Sipin',
                                'legok': 'Legok',
                                'tengah': 'Tengah'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah subur untuk perkebunan'
                            }
                        }
                    }
                },
                'muaro-jambi': {
                    name: 'Kabupaten Muaro Jambi',
                    districts: {
                        'sekojam': {
                            name: 'Sekojam',
                            villages: {
                                'sekojam': 'Sekojam',
                                'berembang': 'Berembang',
                                'lubuk-ramo': 'Lubuk Ramo',
                                'muaro-pijoan': 'Muaro Pijoan'
                            },
                            soilData: {
                                soilType: 'Organosol',
                                soilFertility: 'subur',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah gambut yang subur'
                            }
                        },
                        'kumpeh': {
                            name: 'Kumpeh',
                            villages: {
                                'kumpeh': 'Kumpeh',
                                'kumpeh-ulu': 'Kumpeh Ulu',
                                'muaro-kumpeh': 'Muaro Kumpeh',
                                'sungai-gelam': 'Sungai Gelam'
                            },
                            soilData: {
                                soilType: 'Alluvial',
                                soilFertility: 'subur',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah endapan sungai yang subur'
                            }
                        }
                    }
                }
            }
        },
        'sumatera-selatan': {
            name: 'Sumatera Selatan',
            cities: {
                'palembang': {
                    name: 'Kota Palembang',
                    districts: {
                        'ilir-barat-ii': {
                            name: 'Ilir Barat II',
                            villages: {
                                'demang-lebar': 'Demang Lebar',
                                'karya-jaya': 'Karya Jaya',
                                'lorok-pakjo': 'Lorok Pakjo',
                                'siring-agung': 'Siring Agung'
                            },
                            soilData: {
                                soilType: 'Alluvial',
                                soilFertility: 'subur',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah endapan sungai yang subur'
                            }
                        },
                        'seberang-ulu-i': {
                            name: 'Seberang Ulu I',
                            villages: {
                                '16-ilir': '16 Ilir',
                                '20-ilir': '20 Ilir',
                                '22-ilir': '22 Ilir',
                                '26-ilir': '26 Ilir'
                            },
                            soilData: {
                                soilType: 'Organosol',
                                soilFertility: 'subur',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah gambut yang subur'
                            }
                        }
                    }
                },
                'musi-banyuasin': {
                    name: 'Kabupaten Musi Banyuasin',
                    districts: {
                        'sekayu': {
                            name: 'Sekayu',
                            villages: {
                                'sekayu': 'Sekayu',
                                'sungai-lilin': 'Sungai Lilin',
                                'banyu-lincir': 'Banyu Lincir',
                                'bayung-lencir': 'Bayung Lencir'
                            },
                            soilData: {
                                soilType: 'Organosol',
                                soilFertility: 'subur',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah gambut yang subur'
                            }
                        },
                        'sungai-keruh': {
                            name: 'Sungai Keruh',
                            villages: {
                                'sungai-keruh': 'Sungai Keruh',
                                'babat-toman': 'Babat Toman',
                                'sanga-desa': 'Sanga Desa',
                                'lawang-wetan': 'Lawang Wetan'
                            },
                            soilData: {
                                soilType: 'Alluvial',
                                soilFertility: 'subur',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah endapan sungai yang subur'
                            }
                        }
                    }
                }
            }
        },
        'lampung': {
            name: 'Lampung',
            cities: {
                'bandar-lampung': {
                    name: 'Kota Bandar Lampung',
                    districts: {
                        'tanjungkarang-barat': {
                            name: 'Tanjungkarang Barat',
                            villages: {
                                'gedong-meneng': 'Gedong Meneng',
                                'rajabasa': 'Rajabasa',
                                'perumnas-wayhalim': 'Perumnas Wayhalim',
                                'wayhalim': 'Wayhalim'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah subur untuk perkebunan'
                            }
                        },
                        'telmuk-betung': {
                            name: 'Telukbetung',
                            villages: {
                                'telukbetung': 'Telukbetung',
                                'bumi-warasa': 'Bumi Waras',
                                'sukaraja': 'Sukaraja',
                                'waylunik': 'Way Lunik'
                            },
                            soilData: {
                                soilType: 'Andosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah vulkanik subur'
                            }
                        }
                    }
                },
                'lampung-selatan': {
                    name: 'Kabupaten Lampung Selatan',
                    districts: {
                        'kalianda': {
                            name: 'Kalianda',
                            villages: {
                                'kalianda': 'Kalianda',
                                'way-urang': 'Way Urang',
                                'merak-batin': 'Merak Batin',
                                'bumi-agung': 'Bumi Agung'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah subur untuk perkebunan'
                            }
                        },
                        'bakauheni': {
                            name: 'Bakauheni',
                            villages: {
                                'bakauheni': 'Bakauheni',
                                'harta-purna': 'Harta Purna',
                                'kelawi': 'Kelawi',
                                'sukaraja': 'Sukaraja'
                            },
                            soilData: {
                                soilType: 'Regosol',
                                soilFertility: 'sedang',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah berpasir dengan kesuburan sedang'
                            }
                        }
                    }
                }
            }
        },
        'banten': {
            name: 'Banten',
            cities: {
                'serang': {
                    name: 'Kota Serang',
                    districts: {
                        'serang': {
                            name: 'Serang',
                            villages: {
                                'kepandean': 'Kepandean',
                                'lialang': 'Lialang',
                                'pancur': 'Pancur',
                                'sempu': 'Sempu'
                            },
                            soilData: {
                                soilType: 'Alluvial',
                                soilFertility: 'subur',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah endapan sungai yang subur'
                            }
                        },
                        'cipocok-jaya': {
                            name: 'Cipocok Jaya',
                            villages: {
                                'cipocok-jaya': 'Cipocok Jaya',
                                'sawah-luhur': 'Sawah Luhur',
                                'teritih': 'Teritih',
                                'unyak': 'Unyak'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah subur untuk pertanian'
                            }
                        }
                    }
                },
                'tangerang': {
                    name: 'Kota Tangerang',
                    districts: {
                        'ciledug': {
                            name: 'Ciledug',
                            villages: {
                                'ciledug': 'Ciledug',
                                'paninggilan': 'Paninggilan',
                                'pabuaran': 'Pabuaran',
                                'parung-serab': 'Parung Serab'
                            },
                            soilData: {
                                soilType: 'Alluvial',
                                soilFertility: 'subur',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah endapan sungai yang subur'
                            }
                        },
                        'karawaci': {
                            name: 'Karawaci',
                            villages: {
                                'karawaci': 'Karawaci',
                                'bojong-jaya': 'Bojong Jaya',
                                'koang-jaya': 'Koang Jaya',
                                'margasari': 'Margasari'
                            },
                            soilData: {
                                soilType: 'Regosol',
                                soilFertility: 'sedang',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah berpasir dengan kesuburan sedang'
                            }
                        }
                    }
                }
            }
        },
        'di-yogyakarta': {
            name: 'DI Yogyakarta',
            cities: {
                'yogyakarta': {
                    name: 'Kota Yogyakarta',
                    districts: {
                        'gedong-tengen': {
                            name: 'Gedong Tengen',
                            villages: {
                                'gedong-tengen': 'Gedong Tengen',
                                'prawirodirjan': 'Prawirodirjan',
                                'ngupasan': 'Ngupasan',
                                'notoprajan': 'Notoprajan'
                            },
                            soilData: {
                                soilType: 'Alluvial',
                                soilFertility: 'subur',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah endapan sungai yang subur'
                            }
                        },
                        'kotagede': {
                            name: 'Kotagede',
                            villages: {
                                'kotagede': 'Kotagede',
                                'prenggan': 'Prenggan',
                                'purbayan': 'Purbayan',
                                'rejowinangun': 'Rejowinangun'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah subur untuk pertanian'
                            }
                        }
                    }
                },
                'bantul': {
                    name: 'Kabupaten Bantul',
                    districts: {
                        'bantul': {
                            name: 'Bantul',
                            villages: {
                                'bantul': 'Bantul',
                                'palbapang': 'Palbapang',
                                'ringinharjo': 'Ringinharjo',
                                'trirenggo': 'Trirenggo'
                            },
                            soilData: {
                                soilType: 'Andosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah vulkanik subur'
                            }
                        },
                        'pandak': {
                            name: 'Pandak',
                            villages: {
                                'pandak': 'Pandak',
                                'gilangharjo': 'Gilangharjo',
                                'triharjo': 'Triharjo',
                                'wijirejo': 'Wijirejo'
                            },
                            soilData: {
                                soilType: 'Regosol',
                                soilFertility: 'sedang',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah berpasir dengan kesuburan sedang'
                            }
                        }
                    }
                }
            }
        },
        'kalimantan-barat': {
            name: 'Kalimantan Barat',
            cities: {
                'pontianak': {
                    name: 'Kota Pontianak',
                    districts: {
                        'pontianak-barat': {
                            name: 'Pontianak Barat',
                            villages: {
                                'banjar-serasan': 'Banjar Serasan',
                                'bansir-laut': 'Bansir Laut',
                                'tengah': 'Tengah',
                                'darat-sekip': 'Darat Sekip'
                            },
                            soilData: {
                                soilType: 'Organosol',
                                soilFertility: 'subur',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah gambut yang subur'
                            }
                        },
                        'pontianak-selatan': {
                            name: 'Pontianak Selatan',
                            villages: {
                                'benua-melayu': 'Benua Melayu',
                                'parit-mayor': 'Parit Mayor',
                                'saigon': 'Saigon',
                                'tanjung-hulu': 'Tanjung Hulu'
                            },
                            soilData: {
                                soilType: 'Alluvial',
                                soilFertility: 'subur',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah endapan sungai yang subur'
                            }
                        }
                    }
                },
                'sintang': {
                    name: 'Kabupaten Sintang',
                    districts: {
                        'sintang': {
                            name: 'Sintang',
                            villages: {
                                'sintang': 'Sintang',
                                'jungkal': 'Jungkal',
                                'kapuas-kanan-hulu': 'Kapuas Kanan Hulu',
                                'sebadu': 'Sebadu'
                            },
                            soilData: {
                                soilType: 'Podsolik',
                                soilFertility: 'sedang',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah dengan kesuburan sedang'
                            }
                        },
                        'dedai': {
                            name: 'Dedai',
                            villages: {
                                'dedai': 'Dedai',
                                'nanga-ketebang': 'Nanga Ketebang',
                                'nanga-sokan': 'Nanga Sokan',
                                'tanjung-ninggam': 'Tanjung Ninggam'
                            },
                            soilData: {
                                soilType: 'Organosol',
                                soilFertility: 'subur',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah gambut yang subur'
                            }
                        }
                    }
                }
            }
        },
        'kalimantan-timur': {
            name: 'Kalimantan Timur',
            cities: {
                'samarinda': {
                    name: 'Kota Samarinda',
                    districts: {
                        'samarinda-ulu': {
                            name: 'Samarinda Ulu',
                            villages: {
                                'air-putih': 'Air Putih',
                                'bukuan': 'Bukuan',
                                'lembah-sari': 'Lembah Sari',
                                'sungai-kuning': 'Sungai Kuning'
                            },
                            soilData: {
                                soilType: 'Podsolik',
                                soilFertility: 'sedang',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah dengan kesuburan sedang'
                            }
                        },
                        'samarinda-ilir': {
                            name: 'Samarinda Ilir',
                            villages: {
                                'pelita': 'Pelita',
                                'selili': 'Selili',
                                'sidodadi': 'Sidodadi',
                                'sungai-pinang': 'Sungai Pinang'
                            },
                            soilData: {
                                soilType: 'Alluvial',
                                soilFertility: 'subur',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah endapan sungai yang subur'
                            }
                        }
                    }
                },
                'balikpapan': {
                    name: 'Kota Balikpapan',
                    districts: {
                        'balikpapan-barat': {
                            name: 'Balikpapan Barat',
                            villages: {
                                'baru-ulu': 'Baru Ulu',
                                'kariangau': 'Kariangau',
                                'margo-mulyo': 'Margo Mulyo',
                                'telaga-biru': 'Telaga Biru'
                            },
                            soilData: {
                                soilType: 'Podsolik',
                                soilFertility: 'sedang',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah dengan kesuburan sedang'
                            }
                        },
                        'balikpapan-selatan': {
                            name: 'Balikpapan Selatan',
                            villages: {
                                'damai': 'Damai',
                                'klandasan-ilir': 'Klandasan Ilir',
                                'prapatan': 'Prapatan',
                                'telagasari': 'Telagasari'
                            },
                            soilData: {
                                soilType: 'Regosol',
                                soilFertility: 'sedang',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah berpasir dengan kesuburan sedang'
                            }
                        }
                    }
                }
            }
        },
        'nusa-tenggara-barat': {
            name: 'Nusa Tenggara Barat',
            cities: {
                'mataram': {
                    name: 'Kota Mataram',
                    districts: {
                        'selaparang': {
                            name: 'Selaparang',
                            villages: {
                                'kekalik-jaya': 'Kekalik Jaya',
                                'mataram': 'Mataram',
                                'monjok': 'Monjok',
                                'selagalas': 'Selagalas'
                            },
                            soilData: {
                                soilType: 'Regosol',
                                soilFertility: 'sedang',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Rendah',
                                fertilityDesc: 'Tanah berpasir dengan kesuburan sedang'
                            }
                        },
                        'cakranegara': {
                            name: 'Cakranegara',
                            villages: {
                                'cakranegara': 'Cakranegara',
                                'mataram-timur': 'Mataram Timur',
                                'sandeq': 'Sandeq',
                                'tunjung-sari': 'Tunjung Sari'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah subur untuk pertanian'
                            }
                        }
                    }
                },
                'lombok-barat': {
                    name: 'Kabupaten Lombok Barat',
                    districts: {
                        'gerung': {
                            name: 'Gerung',
                            villages: {
                                'gerung': 'Gerung',
                                'dasan-geres': 'Dasan Geres',
                                'gembong': 'Gembong',
                                'taman-sari': 'Taman Sari'
                            },
                            soilData: {
                                soilType: 'Andosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah vulkanik subur'
                            }
                        },
                        'kebon-arum': {
                            name: 'Kebon Arum',
                            villages: {
                                'kebon-arum': 'Kebon Arum',
                                'lembar': 'Lembar',
                                'meninting': 'Meninting',
                                'senggigi': 'Senggigi'
                            },
                            soilData: {
                                soilType: 'Regosol',
                                soilFertility: 'sedang',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Rendah',
                                fertilityDesc: 'Tanah berpasir dengan kesuburan sedang'
                            }
                        }
                    }
                }
            }
        },
        'nusa-tenggara-timur': {
            name: 'Nusa Tenggara Timur',
            cities: {
                'kupang': {
                    name: 'Kota Kupang',
                    districts: {
                        'kelapa-lima': {
                            name: 'Kelapa Lima',
                            villages: {
                                'kelapa-lima': 'Kelapa Lima',
                                'oebobo': 'Oebobo',
                                'fatululi': 'Fatululi',
                                'naikoten': 'Naikoten'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah subur untuk pertanian'
                            }
                        },
                        'maulafa': {
                            name: 'Maulafa',
                            villages: {
                                'maulafa': 'Maulafa',
                                'fatukoa': 'Fatukoa',
                                'penfui': 'Penfui',
                                'sikumana': 'Sikumana'
                            },
                            soilData: {
                                soilType: 'Regosol',
                                soilFertility: 'sedang',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Rendah',
                                fertilityDesc: 'Tanah berpasir dengan kesuburan sedang'
                            }
                        }
                    }
                },
                'timor-tengah-selatan': {
                    name: 'Kabupaten Timor Tengah Selatan',
                    districts: {
                        'soe': {
                            name: 'Soe',
                            villages: {
                                'soe': 'Soe',
                                'niki-niki': 'Niki Niki',
                                'oelolok': 'Oelolok',
                                'tum': 'Tum'
                            },
                            soilData: {
                                soilType: 'Grumusol',
                                soilFertility: 'kurang-subur',
                                soilPh: '6.5 - 7.5',
                                soilMoisture: 'Rendah',
                                fertilityDesc: 'Memerlukan pengolahan tanah khusus'
                            }
                        },
                        'kapan': {
                            name: 'Kapan',
                            villages: {
                                'kapan': 'Kapan',
                                'nunbena': 'Nunbena',
                                'oetfufu': 'Oetfufu',
                                'tunfeu': 'Tunfeu'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah subur untuk pertanian'
                            }
                        }
                    }
                }
            }
        },
        'maluku': {
            name: 'Maluku',
            cities: {
                'ambon': {
                    name: 'Kota Ambon',
                    districts: {
                        'teluk-ambon': {
                            name: 'Teluk Ambon',
                            villages: {
                                'galala': 'Galala',
                                'hative-kecil': 'Hative Kecil',
                                'laha': 'Laha',
                                'tawiri': 'Tawiri'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah subur untuk perkebunan'
                            }
                        },
                        'sirimau': {
                            name: 'Sirimau',
                            villages: {
                                'ahuru': 'Ahuru',
                                'batu-meja': 'Batu Meja',
                                'kudamati': 'Kudamati',
                                'urimessing': 'Urimessing'
                            },
                            soilData: {
                                soilType: 'Andosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah vulkanik subur'
                            }
                        }
                    }
                },
                'maluku-tengah': {
                    name: 'Kabupaten Maluku Tengah',
                    districts: {
                        'saparua': {
                            name: 'Saparua',
                            villages: {
                                'saparua': 'Saparua',
                                'haruku': 'Haruku',
                                'nusalaut': 'Nusalaut',
                                'siri-sori': 'Siri Sori'
                            },
                            soilData: {
                                soilType: 'Regosol',
                                soilFertility: 'sedang',
                                soilPh: '6.0 - 7.0',
                                soilMoisture: 'Sedang',
                                fertilityDesc: 'Tanah berpasir dengan kesuburan sedang'
                            }
                        },
                        'lease': {
                            name: 'Lease',
                            villages: {
                                'lease': 'Lease',
                                'hulaliu': 'Hulaliu',
                                'kailolo': 'Kailolo',
                                'pelauw': 'Pelauw'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah subur untuk perkebunan'
                            }
                        }
                    }
                }
            }
        },
        'papua': {
            name: 'Papua',
            cities: {
                'jayapura': {
                    name: 'Kota Jayapura',
                    districts: {
                        'jayapura-selatan': {
                            name: 'Jayapura Selatan',
                            villages: {
                                'entrop': 'Entrop',
                                'hamadi': 'Hamadi',
                                'argapura': 'Argapura',
                                'tahima-soroma': 'Tahima Soroma'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah subur untuk perkebunan'
                            }
                        },
                        'abepura': {
                            name: 'Abepura',
                            villages: {
                                'abepura': 'Abepura',
                                'asano': 'Asano',
                                'kota-baru': 'Kota Baru',
                                'waena': 'Waena'
                            },
                            soilData: {
                                soilType: 'Organosol',
                                soilFertility: 'subur',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah gambut yang subur'
                            }
                        }
                    }
                },
                'mimika': {
                    name: 'Kabupaten Mimika',
                    districts: {
                        'mimika-baru': {
                            name: 'Mimika Baru',
                            villages: {
                                'kuala-kencana': 'Kuala Kencana',
                                'kwamki-narama': 'Kwamki Narama',
                                'timika-jaya': 'Timika Jaya',
                                'wania': 'Wania'
                            },
                            soilData: {
                                soilType: 'Podsolik',
                                soilFertility: 'sedang',
                                soilPh: '5.0 - 6.0',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah dengan kesuburan sedang'
                            }
                        },
                        'agimuga': {
                            name: 'Agimuga',
                            villages: {
                                'agimuga': 'Agimuga',
                                'jila': 'Jila',
                                'jita': 'Jita',
                                'tsinga': 'Tsinga'
                            },
                            soilData: {
                                soilType: 'Latosol',
                                soilFertility: 'subur',
                                soilPh: '5.5 - 6.5',
                                soilMoisture: 'Tinggi',
                                fertilityDesc: 'Tanah subur untuk perkebunan'
                            }
                        }
                    }
                }
            }
        },
        // Other provinces would be added here similarly
    };

    // DOM elements
    const provinceSelect = document.getElementById('province');
    const citySelect = document.getElementById('city');
    const districtSelect = document.getElementById('district');
    const villageSelect = document.getElementById('village');
    const soilInfoContainer = document.getElementById('soilInfoContainer');

    // Province change handler
    provinceSelect.addEventListener('change', function() {
        const provinceId = this.value;
        
        // Reset downstream selects
        citySelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
        districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
        villageSelect.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';
        soilInfoContainer.style.display = 'none';
        
        // Disable downstream selects
        citySelect.disabled = true;
        districtSelect.disabled = true;
        villageSelect.disabled = true;
        
        if (provinceId && locationData[provinceId]) {
            citySelect.disabled = false;
            
            // Populate cities
            const cities = locationData[provinceId].cities;
            for (const cityId in cities) {
                const option = document.createElement('option');
                option.value = cityId;
                option.textContent = cities[cityId].name;
                citySelect.appendChild(option);
            }
        }
    });

    // City change handler
    citySelect.addEventListener('change', function() {
        const provinceId = provinceSelect.value;
        const cityId = this.value;
        
        // Reset downstream selects
        districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
        villageSelect.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';
        soilInfoContainer.style.display = 'none';
        
        // Disable downstream selects
        districtSelect.disabled = true;
        villageSelect.disabled = true;
        
        if (provinceId && cityId && locationData[provinceId]?.cities[cityId]) {
            districtSelect.disabled = false;
            
            // Populate districts
            const districts = locationData[provinceId].cities[cityId].districts;
            for (const districtId in districts) {
                const option = document.createElement('option');
                option.value = districtId;
                option.textContent = districts[districtId].name;
                districtSelect.appendChild(option);
            }
        }
    });

    // District change handler
    districtSelect.addEventListener('change', function() {
        const provinceId = provinceSelect.value;
        const cityId = citySelect.value;
        const districtId = this.value;
        
        // Reset downstream select
        villageSelect.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';
        soilInfoContainer.style.display = 'none';
        
        // Disable downstream select
        villageSelect.disabled = true;
        
        if (provinceId && cityId && districtId && 
            locationData[provinceId]?.cities[cityId]?.districts[districtId]) {
            villageSelect.disabled = false;
            
            // Populate villages
            const villages = locationData[provinceId].cities[cityId].districts[districtId].villages;
            for (const villageId in villages) {
                const option = document.createElement('option');
                option.value = villageId;
                option.textContent = villages[villageId];
                villageSelect.appendChild(option);
            }
            
            // Display soil information
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

    document.getElementById('harvestPredictionForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show loading indicator
        document.getElementById('loadingIndicator').style.display = 'block';
        document.getElementById('predictionResult').style.display = 'none';
        
        // Get form values
        const provinceId = provinceSelect.value;
        const cityId = citySelect.value;
        const districtId = districtSelect.value;
        const villageId = villageSelect.value;
        const plantType = document.getElementById('plantType').value;
        
        if (!provinceId || !cityId || !districtId || !villageId || !plantType) {
            alert('Silakan lengkapi semua data lokasi dan pilih jenis tanaman');
            document.getElementById('loadingIndicator').style.display = 'none';
            return;
        }
        
        // Get soil condition from location data
        const soilCondition = locationData[provinceId]?.cities[cityId]?.districts[districtId]?.soilData?.soilFertility || 'sedang';
        
        // Get location names
        const provinceName = locationData[provinceId].name;
        const cityName = locationData[provinceId].cities[cityId].name;
        const districtName = locationData[provinceId].cities[cityId].districts[districtId].name;
        const villageName = locationData[provinceId].cities[cityId].districts[districtId].villages[villageId];
        
        // Simulate API call (in a real app, this would be an actual API call)
        setTimeout(function() {
            // Hide loading indicator
            document.getElementById('loadingIndicator').style.display = 'none';
            
            // Display results
            document.getElementById('resultLocation').textContent = `${villageName}, ${districtName}, ${cityName}, ${provinceName}`;
            document.getElementById('resultPlant').textContent = document.getElementById('plantType').options[document.getElementById('plantType').selectedIndex].text;
            
            // Display soil condition with description
            const soilDesc = {
                'subur': 'Subur (Kaya nutrisi, cocok untuk berbagai tanaman)',
                'sedang': 'Sedang (Memerlukan pemupukan tambahan)',
                'kurang-subur': 'Kurang Subur (Perlu perlakuan khusus dan pemupukan intensif)'
            };
            document.getElementById('resultSoil').textContent = soilDesc[soilCondition];
            
            // Generate prediction based on inputs
            const prediction = generatePrediction(provinceId, plantType, soilCondition);
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
</script>
@endsection
