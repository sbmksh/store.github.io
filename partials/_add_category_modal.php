<div id="add-category" class="modal">

    <form class="modal-content animate" action="/store/handlers/add_handler.php" method="post" enctype="multipart/form-data">
        <div class="imgcontainer">
            <span onclick="document.getElementById('add-category').style.display='none'" class="close"
                title="Close Modal">&times;</span>
            <img src="/store/img/icon/category.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="modal-container">
            <h3>Add Category</h3>
            <label for="cname"><b>Category Name</b></label>
            <input type="text" placeholder="Enter Category Name" name="cname" required>

            <label for="file"><b>Upload a Photo of Category</b></label>
            <input type="file"  name="file" required>


            <button type="submit">Submit</button>


            <button type="button" onclick="document.getElementById('add-category').style.display='none'"
                class="cancelbtn">Cancel</button>

        </div>
    </form>
</div>