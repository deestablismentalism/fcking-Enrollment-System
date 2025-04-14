<!-- <form action="../server_side/test.php" method="POST">
    <label for="Guardian_First_Name">Guardian's First Name:</label>
    <input type="text" id="Guardian_First_Name" name="Guardian_First_Name" required><br><br>

    <label for="Guardian_Last_Name">Guardian's Last Name:</label>
    <input type="text" id="Guardian_Last_Name" name="Guardian_Last_Name" required><br><br>

    <label for="Guardian_Middle_Name">Guardian's Middle Name:</label>
    <input type="text" id="Guardian_Middle_Name" name="Guardian_Middle_Name"><br><br>

    <label for="Parent_Type">Parent Type:</label>
    <select id="Parent_Type" name="Parent_Type" required>
        <option value="Biological">Biological</option>
        <option value="StepGuardian">StepGuardian</option>
        <option value="Guardian">Guardian</option>
    </select><br><br>

    <label for="Guardian_Educational_Attainment">Educational Attainment:</label>
    <input type="text" id="Guardian_Educational_Attainment" name="Guardian_Educational_Attainment" required><br><br>

    <label for="Guardian_Contact_Number">Contact Number:</label>
    <input type="tel" id="Guardian_Contact_Number" name="Guardian_Contact_Number" required><br><br>

    <label for="Guardian_Email">Email:</label>
    <input type="email" id="Guardian_Email" name="Guardian_Email"><br><br>

    <label for="If_4Ps">Is enrolled in 4Ps?</label>
    <select id="If_4Ps" name="If_4Ps" required>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select><br><br>

    <button type="submit">Submit</button>
</form> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Form</title>
</head>
<body>
    <h2>Enrollment Form</h2>
    <form action="../server_side/post_enrollment_form_data.php" method="POST">
        <!-- Educational Information -->
        <fieldset>
            <legend>Educational Information</legend>
            <label for="start-year">School Year Start:</label>
            <input type="text" id="start-year" name="start-year" required><br><br>

            <label for="end-year">School Year End:</label>
            <input type="text" id="end-year" name="end-year" required><br><br>

            <label for="LRN">Is the learner returning? (LRN):</label>
            <input type="checkbox" id="LRN" name="LRN"><br><br>

            <label for="grades-tbe">Enrolling Grade Level:</label>
            <input type="text" id="grades-tbe" name="grades-tbe" required><br><br>

            <label for="last-grade">Last Grade Level Attended:</label>
            <input type="text" id="last-grade" name="last-grade"><br><br>

            <label for="last-year">Last Year Attended:</label>
            <input type="text" id="last-year" name="last-year"><br><br>
        </fieldset>

        <!-- Educational Background -->
        <fieldset>
            <legend>Educational Background</legend>
            <label for="lschool">Last School Attended:</label>
            <input type="text" id="lschool" name="lschool" required><br><br>

            <label for="lschoolID">School ID:</label>
            <input type="text" id="lschoolID" name="lschoolID" required><br><br>

            <label for="lschoolAddress">School Address:</label>
            <input type="text" id="lschoolAddress" name="lschoolAddress" required><br><br>

            <label for="educational-choice">School Type:</label>
            <select id="educational-choice" name="educational-choice" required>
                <option value="public">Public</option>
                <option value="private">Private</option>
                <option value="other">Other</option>
            </select><br><br>

            <label for="fschool">Initial School Choice:</label>
            <input type="text" id="fschool" name="fschool" required><br><br>

            <label for="fschoolID">Initial School ID:</label>
            <input type="text" id="fschoolID" name="fschoolID" required><br><br>

            <label for="fschoolAddress">Initial School Address:</label>
            <input type="text" id="fschoolAddress" name="fschoolAddress" required><br><br>
        </fieldset>

        <!-- Disability Information -->
        <fieldset>
            <legend>Disability Information</legend>
            <label for="sn">Have Special Condition:</label>
            <input type="checkbox" id="sn" name="sn"><br><br>

            <label for="boolsn">Special Condition:</label>
            <input type="text" id="boolsn" name="boolsn"><br><br>

            <label for="at">Have Assistive Technology:</label>
            <input type="checkbox" id="at" name="at"><br><br>

            <label for="atdevice">Assistive Technology Device:</label>
            <input type="text" id="atdevice" name="atdevice"><br><br>
        </fieldset>

        <!-- Enrollee Address -->
        <fieldset>
            <legend>Enrollee Address</legend>
            <label for="house-number">House Number:</label>
            <input type="text" id="house-number" name="house-number" required><br><br>

            <label for="division">Subdivision Name:</label>
            <input type="text" id="division" name="division" required><br><br>

            <label for="barangay">Barangay Name:</label>
            <input type="text" id="barangay" name="barangay" required><br><br>

            <label for="city-municipality">Municipality Name:</label>
            <input type="text" id="city-municipality" name="city-municipality" required><br><br>

            <label for="province">Province Name:</label>
            <input type="text" id="province" name="province" required><br><br>

            <label for="region">Region:</label>
            <input type="text" id="region" name="region" required><br><br>
        </fieldset>

        <!-- Enrollee Parents Information -->
        <fieldset>
            <legend>Enrollee Parents Information</legend>
            <!-- Father -->
            <h3>Father's Information</h3>
            <label for="Father-First-Name">Father's First Name:</label>
            <input type="text" id="Father-First-Name" name="Father-First-Name" required><br><br>

            <label for="Father-Last-Name">Father's Last Name:</label>
            <input type="text" id="Father-Last-Name" name="Father-Last-Name" required><br><br>

            <label for="Father-Middle-Name">Father's Middle Name:</label>
            <input type="text" id="Father-Middle-Name" name="Father-Middle-Name"><br><br>

            <label for="F-highest-education">Father's Highest Education:</label>
            <input type="text" id="F-highest-education" name="F-highest-education"><br><br>

            <label for="F-Number">Father's Contact Number:</label>
            <input type="text" id="F-Number" name="F-Number"><br><br>

            <label for="fourPS">Father Beneficiary of 4Ps?</label>
            <input type="checkbox" id="fourPS" name="fourPS"><br><br>

            <!-- Mother -->
            <h3>Mother's Information</h3>
            <label for="Mother-First-Name">Mother's First Name:</label>
            <input type="text" id="Mother-First-Name" name="Mother_First_Name" required><br><br>

            <label for="Mother-Last-Name">Mother's Last Name:</label>
            <input type="text" id="Mother-Last-Name" name="Mother_Last_Name" required><br><br>

            <label for="Mother-Middle-Name">Mother's Middle Name:</label>
            <input type="text" id="Mother-Middle-Name" name="Mother_Middle_Name"><br><br>

            <label for="M-highest-education">Mother's Highest Education:</label>
            <input type="text" id="M-highest-education" name="M-highest-education"><br><br>

            <label for="M-Number">Mother's Contact Number:</label>
            <input type="text" id="M-Number" name="M-Number"><br><br>

            <label for="fourPS">Mother Beneficiary of 4Ps?</label>
            <input type="checkbox" id="fourPS" name="fourPS"><br><br>

            <!-- Guardian -->
            <h3>Guardian's Information</h3>
            <label for="Guardian-First-Name">Guardian's First Name:</label>
            <input type="text" id="Guardian-First-Name" name="Guardian_First_Name"><br><br>

            <label for="Guardian-Last-Name">Guardian's Last Name:</label>
            <input type="text" id="Guardian-Last-Name" name="Guardian_Last_Name"><br><br>

            <label for="Guardian-Middle-Name">Guardian's Middle Name:</label>
            <input type="text" id="Guardian-Middle-Name" name="Guardian_Middle_Name"><br><br>

            <label for="G-highest-education">Guardian's Highest Education:</label>
            <input type="text" id="G-highest-education" name="G-highest-education"><br><br>

            <label for="G-Number">Guardian's Contact Number:</label>
            <input type="text" id="G-Number" name="G-Number"><br><br>

            <label for="fourPS">Guardian Beneficiary of 4Ps?</label>
            <input type="checkbox" id="fourPS" name="fourPS"><br><br>
        </fieldset>

        <!-- Enrollee Information -->
        <fieldset>
            <legend>Enrollee Information</legend>
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" required><br><br>

            <label for="mname">Middle Name:</label>
            <input type="text" id="mname" name="mname"><br><br>

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" required><br><br>

            <label for="extension">Extension:</label>
            <input type="text" id="extension" name="extension"><br><br>

            <label for="boolLRN">Learner Reference Number (LRN):</label>
            <input type="text" id="boolLRN" name="boolLRN" required><br><br>

            <label for="PSA-number">PSA Number:</label>
            <input type="text" id="PSA-number" name="PSA-number"><br><br>

            <label for="bday">Birth Date:</label>
            <input type="date" id="bday" name="bday" required><br><br>

            <label for="age">Age:</label>
            <input type="text" id="age" name="age" required><br><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select><br><br>

            <label for="religion">Religion:</label>
            <input type="text" id="religion" name="religion"><br><br>

            <label for="language">Native Language:</label>
            <input type="text" id="language" name="language"><br><br>

            <label for="group">Cultural Group?</label>
            <input type="checkbox" id="group" name="group"><br><br>

            <label for="community">Cultural Community:</label>
            <input type="text" id="community" name="community"><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
        </fieldset>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
