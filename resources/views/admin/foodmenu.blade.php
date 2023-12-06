<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        @include("admin.admincss")
    </head>
    <body>
        <div class="container-scroller">
            @include("admin.navbar")
            <div style="position:relative; top:60px; right: -150px">
                <form action="{{ url('/uploadfood') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label>Title</label>
                        <input style="color: darkgrey;" type="text" name="title" placeholder="Write a title" required>
                    </div>
                    <div>
                        <label>Price</label>
                        <input style="color: darkgrey;" type="number" name="price" placeholder="Price" required>
                    </div>
                    <div>
                        <label>Image</label>
                        <input type="file" name="image" required>
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <input type="text" name="description" placeholder="Description" style="color: darkgrey;" required>
                    </div>
                    <div>
                        <input style="color: limegreen;" type="submit" value="Save">
                    </div>
                </form>
            </div>
        </div>
        @include("admin.adminscript")
    </body>
    </html>
</x-app-layout>
