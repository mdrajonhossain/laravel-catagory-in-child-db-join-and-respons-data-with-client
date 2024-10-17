<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Tree with Icons</title>

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        /* Indentation and color for each level */
        option[data-level="0"] { color: #000080; font-weight: bold; } /* Navy for parent */
        option[data-level="1"] { color: #006400; } /* Dark green for first child */
        option[data-level="2"] { color: #8B4513; } /* Saddle brown for second child */
        option[data-level="3"] { color: #708090; } /* Slate gray for deeper levels */
        
        /* Optional: Indentations for each child level */
        option[data-level="1"] { padding-left: 20px; }
        option[data-level="2"] { padding-left: 40px; }
        option[data-level="3"] { padding-left: 60px; }
    </style>
</head>
<body>

    <form>
        <label for="category">Select Category:</label>
        <select id="category" class="form-control">
            <option value="">-- Select a Category --</option>
        </select>

        <br><br>
        <button type="submit">Submit</button>
    </form>

    <script>
        // Sample JSON Data (Category Tree)
        const categories = [
            {
                "id": 1,
                "name": "Electronics",
                "parent_id": null,
                "children": [
                    {
                        "id": 2,
                        "name": "Mobiles",
                        "parent_id": 1,
                        "children": [
                            {
                                "id": 3,
                                "name": "Smartphones",
                                "parent_id": 2,
                                "children": []
                            },
                            {
                                "id": 4,
                                "name": "Feature Phones",
                                "parent_id": 2,
                                "children": [
                                    {
                                        "id": 3,
                                        "name": "Smartphones",
                                        "parent_id": 2,
                                        "children": []
                                    },
                                    {
                                        "id": 4,
                                        "name": "Feature Phones",
                                        "parent_id": 2,
                                        "children": [
                                    {
                                        "id": 3,
                                        "name": "Smartphones",
                                        "parent_id": 2,
                                        "children": []
                                    },
                                    {
                                        "id": 4,
                                        "name": "Feature Phones",
                                        "parent_id": 2,
                                        "children": []
                                    }
                                ]
                                    }
                                ]
                            }
                        ]
                    },
                    {
                        "id": 5,
                        "name": "Laptops",
                        "parent_id": 1,
                        "children": []
                    }
                ]
            },
            {
                "id": 6,
                "name": "Home Appliances",
                "parent_id": null,
                "children": [
                    {
                        "id": 7,
                        "name": "Refrigerators",
                        "parent_id": 6,
                        "children": []
                    },
                    {
                        "id": 8,
                        "name": "Washing Machines",
                        "parent_id": 6,
                        "children": []
                    }
                ]
            }
        ];

        // Icon mapping based on the level
        const iconMap = {
            0: '<i class="fas fa-folder"></i>',   // Parent category
            1: '<i class="fas fa-mobile-alt"></i>',  // First child level
            2: '<i class="fas fa-phone"></i>',   // Second child level
            3: '<i class="fas fa-cog"></i>'      // Deeper levels
        };

        // Recursive function to populate categories with icons and colors
        function addCategoriesToSelect(categories, level = 0) {
            categories.forEach(category => {
                const icon = iconMap[level] || '<i class="fas fa-angle-right"></i>'; // Default icon

                $('#category').append(
                    `<option value="${category.id}" data-level="${level}">
                        ${icon} ${'— '.repeat(level)}${category.name}
                    </option>`                    
                );

                // Recursively add children
                if (category.children && category.children.length > 0) {
                    addCategoriesToSelect(category.children, level + 1);
                }
            });
        }

        // Populate the select box on page load
        $(document).ready(function() {
            addCategoriesToSelect(categories);
        });
    </script>

</body>
</html>
