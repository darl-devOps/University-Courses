window.onload = function () {
  // Check if the URL contains a success parameter
  if (
    window.location.search.includes("status=success") ||
    window.location.search.includes("status=error") ||
    window.location.search.includes("status=duplicate") ||
    window.location.search.includes("operationDel=success") ||
    window.location.search.includes("operationDel=error") ||
    window.location.search.includes("update=true") ||
    window.location.search.includes("update=false") ||
    window.location.search.includes("status=addedMod") ||
    window.location.search.includes("status=negAddMod")
  ) {
    // Remove the success parameter from the URL after 2 seconds to avoid the alert from popping up when refreshed
    setTimeout(function () {
      var url = window.location.href.replace("?status=success", "");
      window.history.replaceState({}, document.title, url);
    }, 2000);
    // Remove the error parameter from the URL after 2 seconds to avoid the alert from popping up when refreshed
    setTimeout(function () {
      var url = window.location.href.replace("?status=error", "");
      window.history.replaceState({}, document.title, url);
    }, 2000);
    // Remove the duplicate parameter from the URL after 2 seconds to avoid the alert from popping up when refreshed
    setTimeout(function () {
      var url = window.location.href.replace("?status=duplicate", "");
      window.history.replaceState({}, document.title, url);
    }, 2000);
    // Remove the operationDel parameter from the URL after 2 seconds to avoid the alert from popping up when refreshed
    setTimeout(function () {
      var url = window.location.href.replace("?operationDel=success", "");
      window.history.replaceState({}, document.title, url);
    }, 2000);
    // Remove the operationDel parameter from the URL after 2 seconds to avoid the alert from popping up when refreshed
    setTimeout(function () {
      var url = window.location.href.replace("?operationDel=error", "");
      window.history.replaceState({}, document.title, url);
    }, 2000);
    // Remove the update parameter from the URL after 2 seconds to avoid the alert from popping up when refreshed
    setTimeout(function () {
      var url = window.location.href.replace("?update=true", "");
      window.history.replaceState({}, document.title, url);
    }, 2000);
    // Remove the update parameter from the URL after 2 seconds to avoid the alert from popping up when refreshed
    setTimeout(function () {
      var url = window.location.href.replace("?update=false", "");
      window.history.replaceState({}, document.title, url);
    }, 2000);

    // Remove the update parameter from the URL after 2 seconds to avoid the alert from popping up when refreshed
    setTimeout(function () {
      var url = window.location.href.replace("?status=addedMod", "");
      window.history.replaceState({}, document.title, url);
    }, 2000);

    // Remove the update parameter from the URL after 2 seconds to avoid the alert from popping up when refreshed
    setTimeout(function () {
      var url = window.location.href.replace("?status=negAddMod", "");
      window.history.replaceState({}, document.title, url);
    }, 2000);
}
};

//Auto complete functionality for total number of students enrolled
function autoCompleteEnrollment() {

  const local_students = parseInt(document.getElementById("no-of-loc").value);
  const international_students = parseInt(
    document.getElementById("no-of-int").value
  );

  const totalEnrolled =
    !isNaN(local_students) && !isNaN(international_students)
      ? local_students + international_students
      : 0;
  document.getElementById("enrolled-students").value = totalEnrolled;
}

autoCompleteEnrollment();

document
  .getElementById("no-of-loc")
  .addEventListener("input", autoCompleteEnrollment);
document
  .getElementById("no-of-int")
  .addEventListener("input", autoCompleteEnrollment);

//Function to present the user with a confirmation dialog
function confirmDelete(id, course_code) {
  if (confirm("Are you sure you want to delete this record? This will delete all the modules linked to this course. This operation is not reversible. Proceed?")) {
    //Confirmed deletion
    window.location.href = "scripts/delete_course.php?id=" + id + "&course_code=" + course_code;
  } else {
    //Aborted deletion
    return false;
  }
}


