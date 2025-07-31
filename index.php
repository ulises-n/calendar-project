<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css" >
</head>
<body>

  <header>
    <h1>🗓️ Course Calendar<br> My Calendar Project</h1>
  </header>

  <!-- Clock -->
  <div class="clock-container">
    <div id="clock"></div>
  </div>
  <!-- Calendar Section -->
   <div class="calendar">
    <div class="nav-btn-container">
      <button class="nav-btn">⏮️</button>
      <h2 id="monthYear" style="margin: 0"></h2>
      <button class="nav-btn">⏭️</button>
    </div>

    <div class="calendar-grid" id="calendar"></div>
   </div>

   <!-- Modal for add/edit/delete appointment -->
<div class="modal" id="eventModal">
  <div class="modal-content">

    <div id="eventSelectorWrapper">
      <label for="eventSelector">
        <strong>Select Event:</strong>
      </label>
      <select name="" id="eventSelector">
        <option disabled selected>Choose Event...</option>
      </select>
    </div>

    <!-- Main form -->

    <form method="POST" id="eventForm">
        <input type="hidden" name="action" id="formAction" value="add">
        <input type="hidden" name="event_id" id="eventId">

        <label for="courserName">Course Title</label>
        <input type="text" name="course_name" id="courseName" require>

        <label for="instructorName">Instructor Name:</label>
        <input type="text" name="instructor_name" id="instructorName" require>

        <label for="startDate">Start Date</label>
        <input type="data" name="start_date" id="startDate" require>

        <label for="endDate">End Date:</label>
        <input type="date" name="end_date" id="endDate" require>

        <button type="submit">Save</button>
    </form>

    <!-- Delete Form --> 
      
    <form method="POST" onsubmit="return confirm('Seguro quieres borrar esta tarea?')">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="event_id" id="deleteEventId">
        <button type="submit" class="submit-btn">🚮 Delete</button>
    </form>

    <!-- Cancel -->
      <button type="button" class="submit-btn">❌ Cancel</button>

  </div>
</div>

    <script src="calendar.js"></script>
</body>
</html>