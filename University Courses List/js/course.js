function updateCourses() {
  //Constant to hold the URL of the JSON source file
  const url = "./course.json";

  //Fetch function to get the data from the JSON file
  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      
      let table = document.getElementById("courses");
      let row;
      //For loop to loop through the data in the JSON file represented in an array. Once the loop has ran through 4 instances of data in the array, a new row is inserted
      for (let i = 0; i < data.length; i++) {
        if (i % 4 === 0) {
          row = table.insertRow();
        }

        // Get all table rows
        let rows = table.getElementsByTagName("tr");

        // Loop through each row
        for (let t = 0; t < rows.length; t++) {
          // Get all cells in the current row
          let cells = rows[t].getElementsByTagName("td");

          // Loop through each cell and add the CSS class
          for (let j = 0; j < cells.length; j++) {
            cells[j].classList.add("course-card");
          }
        }
        let cellInsert = row.insertCell();
        //Declaration and assignment of a variable to display the fees to the nearest value with 2 decimal places
        const floatedFee = data[i].courseFees.toFixed(2);
        cellInsert.innerHTML = `
                         
                  <img class = "course-icon" src="${data[i].courseIcon}" alt="course-icon">
                  <h3 class="course-name">${data[i].courseName}</h3>
                  <h4>Course ID: ${data[i].courseID}</h4>
                  <h4 class = "course-fees" data-orig-amount = "${floatedFee}">Fees: <span class="course-fee-amount">${floatedFee}</span><span class = "currSym" data-orig-curr = "${data[i].courseCurrency}"> ${data[i].courseCurrency}</span></h4>
                  <h4>Level: ${data[i].courseLevel}</h4>
                  <h4>Starting: September</h4>
                  <h4>Duration: ${data[i].courseDuration}</h4>
                  <h4>Location: ${data[i].courseLocation}</h4>
                  `;
        // Add class to cells in the last row if cells < 4
        if (data.length % 4 !== 0 || i === data.length - 1) {
          let lastRow = rows[rows.length - 1];
          let lastRowCells = lastRow.getElementsByTagName("td");
          for (let j = 0; j < lastRowCells.length; j++) {
            lastRowCells[j].classList.add("course-card");
          }
        }
      }
    })
    .catch((error) => console.log(error));
}

// Call this function again after 2 seconds to load the data from the JSON file
setTimeout(updateCourses, 1000);

//Function to change currency
function currencySwitch() {
  const cs = document.querySelector("#currency-selector");
  let allCourseFeesElements = document.querySelectorAll(".course-fee-amount");

  allCourseFeesElements.forEach((courseFeesElement) => {
    let origCourseFeesValue = parseFloat(
      courseFeesElement.parentNode.dataset.origAmount
    ).toFixed(2);
    let origCurrencySymbol =
      courseFeesElement.parentNode.querySelector(".currSym").dataset.origCurr;

    if (cs.selectedIndex === 1) {
      courseFeesElement.innerHTML = origCourseFeesValue.toString();
      courseFeesElement.parentNode.querySelector(".currSym").innerHTML =
        " " + origCurrencySymbol;
    } else if (cs.selectedIndex === 2) {
      let newCourseFeesValue = (origCourseFeesValue * 1.39).toFixed(2);
      courseFeesElement.innerHTML = newCourseFeesValue.toString();
      courseFeesElement.parentNode.querySelector(".currSym").innerHTML = " USD";
    } else if (cs.selectedIndex === 3) {
      let newCourseFeesValue = (origCourseFeesValue * 1.16).toFixed(2);
      courseFeesElement.innerHTML = newCourseFeesValue.toString();
      courseFeesElement.parentNode.querySelector(".currSym").innerHTML = " EUR";
    }
    else if (cs.selectedIndex === 4) {
      let newCourseFeesValue = (origCourseFeesValue * 58.09).toFixed(2);
      courseFeesElement.innerHTML = newCourseFeesValue.toString();
      courseFeesElement.parentNode.querySelector(".currSym").innerHTML = " MUR";
    }
  });
}
