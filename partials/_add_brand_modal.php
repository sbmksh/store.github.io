<div id="add-brand" class="modal">

    <form class="modal-content animate" action="/store/handlers/add_handler.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('add-brand').style.display='none'" class="close"
                title="Close Modal">&times;</span>
            <img src="/store/img/icon/brand.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="modal-container">
            <h3>Add brand</h3>
            <label for="brandname"><b>Brand Name</b></label>
            <input type="text" placeholder="Enter Brand Name" name="brandname" required>


            <button type="submit">Submit</button>


            <button type="button" onclick="document.getElementById('add-brand').style.display='none'"
                class="cancelbtn">Cancel</button>

        </div>
    </form>
</div>