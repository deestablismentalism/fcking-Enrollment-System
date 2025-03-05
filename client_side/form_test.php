<form action="../server_side/test.php" method="POST">
    <label for="Have_Special_Condition">Do you have a special condition?</label>
    <select name="Have_Special_Condition" id="Have_Special_Condition" required>
        <option value="YES">Yes</option>
        <option value="NO">No</option>
    </select>
    <br>

    <label for="Special_Condition">If yes, please specify:</label>
    <input type="text" name="Special_Condition" id="Special_Condition">
    <br>

    <label for="Have_Assistive_Tech">Do you use assistive technology?</label>
    <select name="Have_Assistive_Tech" id="Have_Assistive_Tech" required>
        <option value="YES">Yes</option>
        <option value="NO">No</option>
    </select>
    <br>

    <label for="Assistive_Tech">If yes, please specify:</label>
    <input type="text" name="Assistive_Tech" id="Assistive_Tech">
    <br>

    <button type="submit">Submit</button>
</form>
