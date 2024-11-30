
<html>
<head>
   
    <title> Filters </title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>all of filters </h1>

   
    <button onclick="showClass(1)">Show Class 1</button>
    <button onclick="showClass(2)">Show Class 2</button>
    <button onclick="showClass(3)">Show Both</button>

    <button onclick="filterByGender('MALE')">Show All Males</button>
    <button onclick="filterByGender('FEMALE')">Show All Females</button>
    <button onclick="showAll()">Show All Students</button>

    <br>
    <input type="text" id="search" placeholder="Search students by name" onkeyup="searchStudents()">
    <br><br>
    
    
    <button onclick="filterBySumScore('above')">Show Students with Sum Score > 30</button>
    <button onclick="filterBySumScore('below')">Show Students with Sum Score < 30</button>
    <button onclick="filterBySumScore('both')">Show All Students (Sum Score)</button>
    
  
    <button onclick="filterByIncrement()">Show Students with Incrementing Scores</button>

    <div id="classDisplay">
        <!-- Filtered results will appear here -->
    </div>

    <script>
      
        const class1 = [
            ['AA111111', 'name1', 'surname1', 'MALE', 22, 10, 34],
            ['BB222222', 'name2', 'surname2', 'FEMALE', 12, 14, 50],
            ['CC333333', 'name3', 'surname3', 'FEMALE', 1, 7, 18],
            ['DD444444', 'name4', 'surname4', 'MALE', 4, 21, 40],
            ['EE555555', 'name5', 'surname5', 'MALE', 11, 11, 26]
        ];

        const class2 = [
            ['FF666666', 'name11', 'surname11', 'FEMALE', 13, 5, 0],
            ['GG777777', 'name21', 'surname21', 'MALE', 4, 11, 24],
            ['HH888888', 'name31', 'surname31', 'MALE', 10, 15, 38],
            ['II999999', 'name41', 'surname41', 'FEMALE', 25, 10, 36],
            ['JJ101010', 'name51', 'surname51', 'MALE', 0, 6, 20]
        ];

        let filteredClass1 = class1;
        let filteredClass2 = class2;

      
        function showClass(option) {
            if (option === 1) {
                filteredClass1 = class1;
                filteredClass2 = [];
            } else if (option === 2) {
                filteredClass1 = [];
                filteredClass2 = class2;
            } else {
                filteredClass1 = class1;
                filteredClass2 = class2;
            }
            displayResults();
        }

        
        function filterByGender(gender) {
            filteredClass1 = class1.filter(student => student[3] === gender);
            filteredClass2 = class2.filter(student => student[3] === gender);
            displayResults();
        }

       
        function showAll() {
            filteredClass1 = class1;
            filteredClass2 = class2;
            displayResults();
        }

        function filterBySumScore(condition) {
            filteredClass1 = class1.filter(student => {
                const sum = student[4] + student[5] + student[6];
                if (condition === 'above') {
                    return sum > 30;
                } else if (condition === 'below') {
                    return sum < 30;
                }
                return true; // 'both'
            });

            filteredClass2 = class2.filter(student => {
                const sum = student[4] + student[5] + student[6];
                if (condition === 'above') {
                    return sum > 30;
                } else if (condition === 'below') {
                    return sum < 30;
                }
                return true; // 'both'
            });

            displayResults();
        }

        
        function searchStudents() {
            const searchTerm = document.getElementById('search').value.toLowerCase();
            filteredClass1 = class1.filter(student => student[0].toLowerCase().includes(searchTerm) || student[1].toLowerCase().includes(searchTerm));
            filteredClass2 = class2.filter(student => student[0].toLowerCase().includes(searchTerm) || student[1].toLowerCase().includes(searchTerm));
            displayResults();
        }

        function filterByIncrement() {
            filteredClass1 = class1.filter(student => student[4] < student[5] && student[5] < student[6]);
            filteredClass2 = class2.filter(student => student[4] < student[5] && student[5] < student[6]);
            displayResults();
        }

       
        function displayResults() {
            let htmlContent = '<h2>Filtered Students</h2>';

          
            if (filteredClass1.length > 0) {
                htmlContent += '<h3>Class 1:</h3>';
                filteredClass1.forEach(student => {
                    htmlContent += `<p>${JSON.stringify(student)}</p>`; // Shows the full array as a string
                });
            }

          
            if (filteredClass2.length > 0) {
                htmlContent += '<h3>Class 2:</h3>';
                filteredClass2.forEach(student => {
                    htmlContent += `<p>${JSON.stringify(student)}</p>`; // Shows the full array as a string
                });
            }

          
            if (filteredClass1.length === 0 && filteredClass2.length === 0) {
                htmlContent += '<p>No students found based on the selected filters.</p>';
            }

            document.getElementById('classDisplay').innerHTML = htmlContent;
        }
    </script>
</body>
</html>
