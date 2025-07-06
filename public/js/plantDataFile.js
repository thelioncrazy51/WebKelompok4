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

// Export data agar bisa diimpor di file lain
if (typeof module !== 'undefined' && module.exports) {
    module.exports = plantData;
}