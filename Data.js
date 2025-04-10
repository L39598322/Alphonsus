// Beginning of Code -- !OWN CODE!
document.addEventListener('DOMContentLoaded', function() {
    // Defining the Radio buttons in JavaScript using the IDs from ShowData.php
    const pupildataRadio = document.getElementById('pupilsdata');
    const teacherdataRadio = document.getElementById('teachersdata');
    const teachingassistdataRadio = document.getElementById('teachingassistsdata');
    const parentdataRadio = document.getElementById('parentsdata');
    const familydataRadio = document.getElementById('familiesdata');
    const classesdataRadio = document.getElementById('classesdata');

    // Defining the Tables in JavaScript using the IDs from ShowData.php
    const pupilTable = document.getElementById('pupilstable');
    const teacherTable = document.getElementById('teacherstable');
    const teachingassistTable = document.getElementById('teachingassiststable')
    const parentTable = document.getElementById('parentstable');
    const familyTable = document.getElementById('familiestable');
    const classesTable = document.getElementById('classestable');

    // Function to hide all tables
    function hideTables() {
        pupilTable.style.display ='none';
        teacherTable.style.display ='none';
        teachingassistTable.style.display ='none';
        parentTable.style.display ='none';
        familyTable.style.display ='none';
        classesTable.style.display ='none';
    }
    
    // Listening for Radio button "pupildataRadio" to be active - Once active, execute code
    pupildataRadio.addEventListener('change', function() {
        //Hides other tables and display Pupils Table
        hideTables();
        pupilTable.style.display = 'block';
    });

    // Listening for Radio button "teacherdataRadio" to be active - Once active, execute code
    teacherdataRadio.addEventListener('change', function() {
        //Hides other tables and display Teachers Table
        hideTables();
        teacherTable.style.display = 'block';
    });

    // Listening for Radio button "teachingassistdataRadio" to be active - Once active, execute code
    teachingassistdataRadio.addEventListener('change', function() {
        //Hides other tables and display Teaching Assistants Table
        hideTables();
        teachingassistTable.style.display = 'block';
    });

    // Listening for Radio button "teacherdataRadio" to be active - Once active, execute code
    parentdataRadio.addEventListener('change', function() {
        //Hides other tables and display Teachers Table
        hideTables();
        parentTable.style.display = 'block';
    });
    
    // Listening for Radio button "familydataRadio" to be active - Once active, execute code
    familydataRadio.addEventListener('change', function() {
        //Hides other tables and display Families Table
        hideTables();
        familyTable.style.display = 'block';
    });

    // Listening for Radio button "teacherdataRadio" to be active - Once active, execute code
    classesdataRadio.addEventListener('change', function() {
        //Hides other tables and display Teachers Table
        hideTables();
        classesTable.style.display = 'block';
    });
});
// End of Code -- !OWN CODE!