<!doctype html>
<html lang="en" dir="rtl">

<head>

    <meta charset="utf-8"/>
    <title>Chat | Chatvia - Responsive Bootstrap 5 Chat App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive Bootstrap 5 Chat App" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- magnific-popup css -->
    <link href="{{asset('assets/libs/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css"/>

    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{asset('assets/libs/owl.carousel/assets/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/libs/owl.carousel/assets/owl.theme.default.min.css')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap-rtl.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('assets/css/app-rtl.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>


</head>

<body>


<div class="layout-wrapper d-lg-flex">

    <!-- Start User chat -->
    <div class="user-chat w-100 overflow-hidden user-chat-show">
        <div class="d-lg-flex">
            <!-- start chat conversation section -->
            <div class="w-100 overflow-hidden position-relative">
                <div class="p-3 p-lg-4 border-bottom user-chat-topbar">
                    <div class="row align-items-center">
                        <div class="col-sm-4 col-8">
                            <div class="d-flex align-items-center">
                                <div class="d-block d-lg-none me-2 ms-0">
                                    <a href="{{route('index')}}" class="user-chat-remove text-muted font-size-16 p-2"><i
                                            class="ri-arrow-left-s-line"></i></a>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-0 text-truncate"><a class="text-reset user-profile-show">{{$channel->title}}</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end chat user head -->

                <!-- start chat conversation -->
                <div class="chat-conversation p-3 p-lg-4" data-simplebar="init">
                    <ul class="list-unstyled mb-0">

                        @foreach($messages as $message)
                            <li class="right {{'message-elahe-'.$message->id}}">
                                <div class="conversation-list">
                                    <div class="user-chat-content">
                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                @if($message->type == "text")
                                                    <p>{{ $message->text }}</p>
                                                @elseif($message->type == "photo")
                                                    <img src="{{ asset($message->path) }}" alt="Photo"
                                                         style="max-width: 100%">
                                                    @if($message->caption)
                                                        <span>{{ $message->caption }}</span>
                                                    @endif
                                                @elseif($message->type == "video")
                                                    <video controls style="max-width: 100%">
                                                        <source src="{{ asset($message->path) }}"
                                                                type="video/mp4">
                                                    </video>
                                                @elseif($message->type == "document")
                                                    <a href="{{asset($message->path)}}" download>دانلود فایل</a>
                                                @endif
                                            </div>
                                            <div class="dropdown align-self-start">
                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="ri-more-2-fill"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#" onclick="restoreMessage({{$message->id}} , {{$channel->id}})">بازارسال <i
                                                            class="ri-chat-forward-line float-end text-muted"></i></a>
                                                    <a class="dropdown-item" href="#" onclick="deleteMessage({{$message->id}} , {{$channel->id}})">حذف <i
                                                            class="ri-delete-bin-line float-end text-muted"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- end chat conversation end -->


            </div>
            <!-- end chat conversation section -->
        </div>
        <!-- End User chat -->

        <!-- audiocall Modal -->
        <div class="modal fade" id="audiocallModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center p-4">
                            <div class="avatar-lg mx-auto mb-4">
                                <img src="assets/images/users/avatar-4.jpg" alt="" class="img-thumbnail rounded-circle">
                            </div>

                            <h5 class="text-truncate">Doris Brown</h5>
                            <p class="text-muted">Start Audio Call</p>

                            <div class="mt-5">
                                <ul class="list-inline mb-1">
                                    <li class="list-inline-item px-2 me-2 ms-0">
                                        <button type="button" class="btn btn-danger avatar-sm rounded-circle"
                                                data-bs-dismiss="modal">
                                                <span class="avatar-title bg-transparent font-size-20">
                                                    <i class="ri-close-fill"></i>
                                                </span>
                                        </button>
                                    </li>
                                    <li class="list-inline-item px-2">
                                        <button type="button" class="btn btn-success avatar-sm rounded-circle">
                                                <span class="avatar-title bg-transparent font-size-20">
                                                    <i class="ri-phone-fill"></i>
                                                </span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- audiocall Modal -->

        <!-- videocall Modal -->
        <div class="modal fade" id="videocallModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center p-4">
                            <div class="avatar-lg mx-auto mb-4">
                                <img src="assets/images/users/avatar-4.jpg" alt="" class="img-thumbnail rounded-circle">
                            </div>

                            <h5 class="text-truncate">Doris Brown</h5>
                            <p class="text-muted mb-0">Start Video Call</p>

                            <div class="mt-5">
                                <ul class="list-inline mb-1">
                                    <li class="list-inline-item px-2 me-2 ms-0">
                                        <button type="button" class="btn btn-danger avatar-sm rounded-circle"
                                                data-bs-dismiss="modal">
                                                <span class="avatar-title bg-transparent font-size-20">
                                                    <i class="ri-close-fill"></i>
                                                </span>
                                        </button>
                                    </li>
                                    <li class="list-inline-item px-2">
                                        <button type="button" class="btn btn-success avatar-sm rounded-circle">
                                                <span class="avatar-title bg-transparent font-size-20">
                                                    <i class="ri-vidicon-fill"></i>
                                                </span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->
    </div>
    <!-- end  layout wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

    <!-- Magnific Popup-->
    <script src="{{asset('assets/libs/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <!-- owl.carousel js -->
    <script src="{{asset('assets/libs/owl.carousel/owl.carousel.min.js')}}"></script>

    <!-- page init -->
    <script src="{{asset('assets/js/pages/index.init.js')}}"></script>

    <script src="{{asset('assets/js/app.js')}}"></script>


    <script>
        function deleteMessage(messageId, channelId) {
            fetch(`/elahe/public/app/channel/${channelId}/delete/${messageId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    // Add any other headers you may need, such as authorization
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        console.log(data.message); // Show a success message

                        // Dynamically create and append an alert element
                        const alertElement = document.createElement('div');
                        alertElement.classList.add('alert', 'alert-success', 'mt-2');
                        alertElement.innerText = 'Deleted!';
                        document.querySelector(`.message-elahe-${messageId}`).appendChild(alertElement);
                    } else {
                        alert(data.message); // Show an error message
                    }
                })
                .catch(error => console.error('Error:', error));
        }



        function restoreMessage(messageId, channelId) {
            fetch(`/elahe/public/app/channel/${channelId}/restore/${messageId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    // Add any other headers you may need, such as authorization
                },
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message); // Show a message to the user (you can replace this with any UI update logic)
                    // Optionally update the UI to reflect the deleted message, e.g., remove the message element
                    // document.getElementById(`message-${messageId}`).remove();
                })
                .catch(error => console.error('Error:', error));
        }
    </script>


</body>
</html>
