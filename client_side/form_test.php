<form action="../server_side/test.php" method="POST">
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
</form>
