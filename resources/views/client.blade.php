<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parent or Child Category Dropdown - Tailwind CSS & jQuery</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>    
    #dropdownOptions {
      max-height: 150px; /* Set a fixed height */
      overflow-y: auto; /* Enable vertical scrolling */
    }
  </style>
</head>
<body>

  


  <div class="w-1/3 p-5 bg-white rounded-lg shadow-lg">
    <label class="block text-lg font-medium text-gray-700 mb-2">Select Category</label>
    <div id="custom-select" class="relative">      
      <button id="dropdownButton" class="w-full px-4 py-2 text-left border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">Choose a category</button>
      <ul id="dropdownOptions" 
        class="absolute w-full mt-2 border border-gray-300 rounded-lg bg-white shadow-lg hidden z-10">        
      </ul>
    </div>     
  </div>




  <script>
    $(document).ready(function () {      
      const categories = [
            {
                "id": 1,
                "name": "Mobiles",
                "children": [
                  {"id": 1, "name": "Smartphones", "value": "smartphones"},
                  {"id": 2, "name": "Feature Phones", "value": "feature-phones"}
                ]
              },
              {
                "id": 2,
                "name": "Laptops",
                "children": [
                  {"id": 1, "name": "Gaming Laptops", "value": "gaming-laptops"},
                  {"id": 2, "name": "Gaming Laptops", "value": "gaming-laptops"}
                ]
              },
              {
                "id": 3,
                "name": "Computer",
                "children": [
                  {"id": 1, "name": "Gaming Laptops", "value": "gaming-laptops"},
                  {"id": 2, "name": "Gaming Laptops", "value": "gaming-laptops"}
                ]
            }
        ]


      
      function renderCategories(data) {
        data.forEach(category => {
          // Create parent category item
          const parentItem = $(`
            <li class="text-red-800 px-4 py-2 hover:bg-gray-100 cursor-pointer" data-value="${category.name}">
              ${category.name}
            </li>
          `);

          // Append parent category to dropdown
          $('#dropdownOptions').append(parentItem);

          // Append child categories under the parent
          category.children.forEach(child => {
            const childItem = $(`
              <li class="text-blue-800 ml-4 px-4 py-2 hover:bg-gray-200 cursor-pointer" data-value="${child.value}">
                ${child.name}
              </li>
            `);
            $('#dropdownOptions').append(childItem);
          });
        });
      }

      renderCategories(categories);

      

      $('#dropdownButton').on('click', function () {
        $('#dropdownOptions').slideToggle();
      });


      

      $('#dropdownOptions').on('click', 'li[data-value]', function (e) {
        e.stopPropagation();
        const selectedText = $(this).text();
        const selectedValue = $(this).data('value');

        $('#dropdownButton').text(selectedText);
        $('#selected-value').text(selectedValue);        
        $('#dropdownOptions').slideUp();
      });

      


      $(document).on('click', function (e) {
        if (!$(e.target).closest('#custom-select').length) {
          $('#dropdownOptions').slideUp();
        }
      });




    });
  </script>

</body>
</html>