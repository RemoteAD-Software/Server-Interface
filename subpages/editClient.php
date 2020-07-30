<div class="noBlur popupWrapper">
    <div class="noBlur popupFormHolder">
        <form id="editForm" class="noBlur" onsubmit="return false;">
            <label class="noBlur"> Client Location </label><br>

                <?php require "backend/editClientLoadLocations.php"?>
            
            <label class="noBlur"> Client Description </label><br>
            <input type="text" class="noBlur" id="description" name="description" value="" placeholder="Description"><br>

            <label class="noBlur"> Client UUID </label><br>
            <input type="text" class="noBlur readonly" id="id" name="id" value="" placeholder="UUID" readonly><br>

            <div class="noBlur buttonHolder">
                <input type="submit" id="submit" class="noBlur btn" value="Save">
                <button id="close" class="noBlur btn"> Close </button>
            </div>
        </form>
    </div>
</div>     