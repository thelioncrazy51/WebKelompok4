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
    },
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
    },
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

// Export data agar bisa diimpor di file lain
if (typeof module !== 'undefined' && module.exports) {
    module.exports = locationData;
}