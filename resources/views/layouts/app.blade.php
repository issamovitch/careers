<!DOCTYPE html>
<html lang="en">

@include("layouts/head")

<body>

<div id="wrapper">

    @include("layouts/navbar")

    <div id="page-wrapper">

        @include("layouts/messages")

        @section("content")@show

    </div>
    <!-- /#page-wrapper -->

</div>

@include("layouts/foot")


    <script>
        $(function () {
            setTimeout(function () {
                $(".alert-msg").fadeOut();
            }, 4000);
        });
    </script>
<style>
    .alert-msg{
        margin-bottom: 0px;
    }
</style>


</body>

</html>
