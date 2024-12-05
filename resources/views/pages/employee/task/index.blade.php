<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
    <link rel="stylesheet" href="{{ asset('task/') }}/index.css?v={{ time() }}">
</head>

<body>
    <form class="board" id="form" method="post" action="{{ route('employee.task.update') }}">@csrf
        <div class="column-cont">
            <p class="columntitle"> Pending</p>
            <ul id="sortable1" class="droptrue">
                <li class="">
                </li>
                @foreach (@$tasks['pending']??[] as $task)
                    <li class="li">
                        <div id="" class="card">
                            <img class="profile"
                                src="https://images.pexels.com/photos/973506/pexels-photo-973506.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"></img>
                            <div class="status"></div>
                            <div class="content">
                                <input class="inputt" value="pending" readonly hidden name="status[{{ $task->id }}]" >
                                <h1 class="title">{{ $task->title }}</h1>
                                <p class="user">{{ $task->description }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="column-cont">
            <p class="columntitle"> In progress</p>
            <ul id="sortable2" class="droptrue">
                <li class="">
                </li>
                @foreach (@$tasks['in-progress']??[] as $task)
                    <li class="li">
                        <div id="" class="card">
                            <img class="profile"
                                src="https://images.pexels.com/photos/973506/pexels-photo-973506.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"></img>
                            <div class="status"></div>
                            <div class="content">
                                <h1 class="title">{{ $task->title }}</h1>
                                <p class="user">{{ $task->description }}</p>
                                <input class="inputt" value="in-progress" readonly hidden name="status[{{ $task->id }}]" >
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="column-cont">
            <p class="columntitle"> Completed</p>
            <ul id="sortable3" class="droptrue">
                <li class="">
                </li>
                @foreach (@$tasks['completed']??[] as $task)
                    <li class="li">
                        <div id="" class="card">
                            <img class="profile"
                                src="https://images.pexels.com/photos/973506/pexels-photo-973506.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"></img>
                            <div class="status"></div>
                            <div class="content">
                                <h1 class="title">{{ $task->title }}</h1>
                                <p class="user">{{ $task->description }}</p>
                                <input class="inputt" value="completed" readonly hidden name="status[{{ $task->id }}]" >
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </form>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(function() {
            $("ul.droptrue").sortable({
                connectWith: "ul",
                stop: function(event, ui) {

                //   var ss = $("li").closest('#sortable1').find('.inputt').val('pending');
                $('#sortable1').children('.li').children('.card').children('.content').children('.inputt').val('pending');
                $('#sortable2').children('.li').children('.card').children('.content').children('.inputt').val('in-progress');
                $('#sortable3').children('.li').children('.card').children('.content').children('.inputt').val('completed');

                    var fd = $('#form').serialize();

                        $.ajax({
                            url: "{{ route('employee.task.update') }}?"+fd,
                            type: 'POST',
                            success: function(data, textStatus) {

                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                // console.log(XMLHttpRequest.responseJSON.message )
                            }
                        });

                }
            });
            $("ul.dropfalse").sortable({
                connectWith: "ul",
                dropOnEmpty: true,
                stop: function(event, ui) {

                }
            });

            // $("#sortable1, #sortable2, #sortable3").disableSelection();
        });
    </script>
</body>

</html>
