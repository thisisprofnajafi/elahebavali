<a class="mb-1" href="{{route('logout')}}">
    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Attached File">
        <button type="button" class="btn btn-link text-decoration-none font-size-24 btn-lg waves-effect">
            <i class="ri-logout-circle-r-line"></i>
        </button>
    </li>
</a>

@if (session('error'))
    <div class="alert alert-danger m-2">
        {{ session('error') }}
    </div>
@endif
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

    <!-- start chat-leftsidebar -->
    <div class="chat-leftsidebar me-lg-1 ms-lg-0">

        <div class="tab-content">
            <!-- Start chats tab-pane -->
            <div class="tab-pane fade show active" id="pills-chat" role="tabpanel" aria-labelledby="pills-chat-tab">
                <!-- Start chats content -->
                <div>
                    <div class="px-4 pt-4">
                        <h4 class="mb-4">کانال ها</h4>
                    </div> <!-- .p-4 -->

                    <!-- Start chat-message-list -->
                    <div class="">
                        <h5 class="mb-3 px-3 font-size-16">اخیر</h5>

                        <div class="chat-message-list px-2" data-simplebar>

                            <ul class="list-unstyled chat-list chat-user-list">


                                @if(count($channels) > 0)
                                    @foreach($channels as $channel)
                                        <li>
                                            <a href="{{route('channel page',['id'=>$channel->id])}}">
                                                <div class="d-flex">
                                                    <div class="chat-user-img align-self-center me-3 ms-0">
                                                        <div class="avatar-xs">
                                                                                <span
                                                                                    class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                                                    کانال
                                                                                </span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate font-size-15 mb-1">{{$channel->title}}</h5>
                                                        <p class="chat-user-message text-truncate mb-0">
                                                            {{$channel->chat_id}}</p>
                                                    </div>
                                                    <div class="font-size-11">{{count($channel->messages)}}</div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    <p class="text-right text-muted">هیچ کانالی ندارید</p>
                                @endif


                            </ul>
                            <div class="card-body p-4">
                                <div class="p-3">
                                    <form action="{{route('add channel')}}" method="POST">

                                        <div class="mb-3">
                                            <label class="form-label">افزودن کانال</label>
                                            <div class="input-group mb-3 bg-light-subtle rounded-3">
                                                <span class="input-group-text text-muted" id="basic-addon3">
                                                    <i class="ri-user-2-line"></i>
                                                </span>
                                                <input type="text" class="form-control form-control-lg border-light bg-light-subtle" placeholder="ایدی ارسال شده از طرف ربات"  aria-describedby="basic-addon3" name="id">
                                            </div>
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">افزودن</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End chat-message-list -->
                </div>
                <!-- Start chats content -->
            </div>
            <!-- End chats tab-pane -->

            <!-- Start groups tab-pane -->
            <div class="tab-pane" id="pills-groups" role="tabpanel" aria-labelledby="pills-groups-tab">
                <!-- Start Groups content -->
                <div>
                    <div class="p-4">
                        <div class="user-chat-nav float-end">
                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create group">
                                <!-- Button trigger modal -->
                                <button type="button"
                                        class="btn btn-link text-decoration-none text-muted font-size-18 py-0"
                                        data-bs-toggle="modal" data-bs-target="#addgroup-exampleModal">
                                    <i class="ri-group-line me-1 ms-0"></i>
                                </button>
                            </div>

                        </div>
                        <h4 class="mb-4">Groups</h4>

                        <!-- Start add group Modal -->
                        <div class="modal fade" id="addgroup-exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="addgroup-exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-size-16" id="addgroup-exampleModalLabel">Create New
                                            Group</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form>
                                            <div class="mb-4">
                                                <label for="addgroupname-input" class="form-label">Group Name</label>
                                                <input type="text" class="form-control" id="addgroupname-input"
                                                       placeholder="Enter Group Name">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Group Members</label>
                                                <div class="mb-3">
                                                    <button class="btn btn-light btn-sm" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#groupmembercollapse" aria-expanded="false"
                                                            aria-controls="groupmembercollapse">
                                                        Select Members
                                                    </button>
                                                </div>

                                                <div class="collapse" id="groupmembercollapse">
                                                    <div class="card border">
                                                        <div class="card-header">
                                                            <h5 class="font-size-15 mb-0">Contacts</h5>
                                                        </div>
                                                        <div class="card-body p-2">
                                                            <div data-simplebar style="max-height: 150px;">
                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        A
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input"
                                                                                       id="memberCheck1" checked>
                                                                                <label class="form-check-label"
                                                                                       for="memberCheck1">Albert
                                                                                    Rodarte</label>
                                                                            </div>
                                                                        </li>

                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input"
                                                                                       id="memberCheck2">
                                                                                <label class="form-check-label"
                                                                                       for="memberCheck2">Allison
                                                                                    Etter</label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        C
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input"
                                                                                       id="memberCheck3">
                                                                                <label class="form-check-label"
                                                                                       for="memberCheck3">Craig
                                                                                    Smiley</label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        D
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input"
                                                                                       id="memberCheck4">
                                                                                <label class="form-check-label"
                                                                                       for="memberCheck4">Daniel
                                                                                    Clay</label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        I
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input"
                                                                                       id="memberCheck5">
                                                                                <label class="form-check-label"
                                                                                       for="memberCheck5">Iris
                                                                                    Wells</label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        J
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input"
                                                                                       id="memberCheck6">
                                                                                <label class="form-check-label"
                                                                                       for="memberCheck6">Juan
                                                                                    Flakes</label>
                                                                            </div>
                                                                        </li>

                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input"
                                                                                       id="memberCheck7">
                                                                                <label class="form-check-label"
                                                                                       for="memberCheck7">John
                                                                                    Hall</label>
                                                                            </div>
                                                                        </li>

                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input"
                                                                                       id="memberCheck8">
                                                                                <label class="form-check-label"
                                                                                       for="memberCheck8">Joy
                                                                                    Southern</label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        M
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input"
                                                                                       id="memberCheck9">
                                                                                <label class="form-check-label"
                                                                                       for="memberCheck9">Michael
                                                                                    Hinton</label>
                                                                            </div>
                                                                        </li>

                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input"
                                                                                       id="memberCheck10">
                                                                                <label class="form-check-label"
                                                                                       for="memberCheck10">Mary
                                                                                    Farmer</label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        P
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input"
                                                                                       id="memberCheck11">
                                                                                <label class="form-check-label"
                                                                                       for="memberCheck11">Phillis
                                                                                    Griffin</label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        R
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input"
                                                                                       id="memberCheck12">
                                                                                <label class="form-check-label"
                                                                                       for="memberCheck12">Rocky
                                                                                    Jackson</label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        S
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input"
                                                                                       id="memberCheck13">
                                                                                <label class="form-check-label"
                                                                                       for="memberCheck13">Simon
                                                                                    Velez</label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="addgroupdescription-input"
                                                       class="form-label">Description</label>
                                                <textarea class="form-control" id="addgroupdescription-input" rows="3"
                                                          placeholder="Enter Description"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Create Groups</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End add group Modal -->

                        <div class="search-box chat-search-box">
                            <div class="input-group rounded-3">
                                        <span class="input-group-text text-muted bg-light pe-1 ps-3" id="basic-addon1">
                                            <i class="ri-search-line search-icon font-size-18"></i>
                                        </span>
                                <input type="text" class="form-control bg-light" placeholder="Search groups..."
                                       aria-label="Search groups..." aria-describedby="basic-addon1">
                            </div>
                        </div> <!-- Search Box-->
                    </div>

                    <!-- Start chat-group-list -->
                    <div class="p-4 chat-message-list chat-group-list" data-simplebar>


                        <ul class="list-unstyled chat-list">
                            <li>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="chat-user-img me-3 ms-0">
                                            <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                            G
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-0">#General</h5>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="chat-user-img me-3 ms-0">
                                            <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                            R
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-0">#Reporting <span
                                                    class="badge badge-soft-danger rounded-pill float-end">+23</span>
                                            </h5>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="chat-user-img me-3 ms-0">
                                            <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                            D
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-0">#Designers</h5>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="chat-user-img me-3 ms-0">
                                            <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                            D
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-0">#Developers <span
                                                    class="badge badge-soft-danger rounded-pill float-end">New</span>
                                            </h5>
                                        </div>
                                    </div>

                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="chat-user-img me-3 ms-0">
                                            <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                            P
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-0">#Project-alpha</h5>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="chat-user-img me-3 ms-0">
                                            <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                            B
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-0">#Snacks</h5>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End chat-group-list -->
                </div>
                <!-- End Groups content -->
            </div>
            <!-- End groups tab-pane -->

            <!-- Start contacts tab-pane -->
            <div class="tab-pane" id="pills-contacts" role="tabpanel" aria-labelledby="pills-contacts-tab">
                <!-- Start Contact content -->
                <div>
                    <div class="p-4">
                        <div class="user-chat-nav float-end">
                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add Contact">
                                <!-- Button trigger modal -->
                                <button type="button"
                                        class="btn btn-link text-decoration-none text-muted font-size-18 py-0"
                                        data-bs-toggle="modal" data-bs-target="#addContact-exampleModal">
                                    <i class="ri-user-add-line"></i>
                                </button>
                            </div>
                        </div>
                        <h4 class="mb-4">Contacts</h4>

                        <!-- Start Add contact Modal -->
                        <div class="modal fade" id="addContact-exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="addContact-exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-size-16" id="addContact-exampleModalLabel">Add
                                            Contact</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form>
                                            <div class="mb-3">
                                                <label for="addcontactemail-input" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="addcontactemail-input"
                                                       placeholder="Enter Email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="addcontact-invitemessage-input" class="form-label">Invatation
                                                    Message</label>
                                                <textarea class="form-control" id="addcontact-invitemessage-input"
                                                          rows="3" placeholder="Enter Message"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Invite Contact</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Add contact Modal -->

                        <div class="search-box chat-search-box">
                            <div class="input-group bg-light  input-group-lg rounded-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-link text-decoration-none text-muted pe-1 ps-3"
                                            type="button">
                                        <i class="ri-search-line search-icon font-size-18"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control bg-light" placeholder="Search users..">
                            </div>
                        </div>
                        <!-- End search-box -->
                    </div>
                    <!-- end p-4 -->

                    <!-- Start contact lists -->
                    <div class="p-4 chat-message-list chat-group-list" data-simplebar>

                        <div>
                            <div class="p-3 fw-bold text-primary">
                                A
                            </div>

                            <ul class="list-unstyled contact-list">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Albert Rodarte</h5>
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Allison Etter</h5>
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- end contact list A -->

                        <div class="mt-3">
                            <div class="p-3 fw-bold text-primary">
                                C
                            </div>

                            <ul class="list-unstyled contact-list">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Craig Smiley</h5>
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- end contact list C -->

                        <div class="mt-3">
                            <div class="p-3 fw-bold text-primary">
                                D
                            </div>

                            <ul class="list-unstyled contact-list">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Daniel Clay</h5>
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Doris Brown</h5>
                                        </div>

                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <!-- end contact list D -->

                        <div class="mt-3">
                            <div class="p-3 fw-bold text-primary">
                                I
                            </div>

                            <ul class="list-unstyled contact-list">

                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Iris Wells</h5>
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- end contact list I -->

                        <div class="mt-3">
                            <div class="p-3 fw-bold text-primary">
                                J
                            </div>

                            <ul class="list-unstyled contact-list">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Juan Flakes</h5>
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">John Hall</h5>
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Joy Southern</h5>
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- end contact list J -->

                        <div class="mt-3">
                            <div class="p-3 fw-bold text-primary">
                                M
                            </div>

                            <ul class="list-unstyled contact-list">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Mary Farmer</h5>
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Mark Messer</h5>
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Michael Hinton</h5>
                                        </div>

                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <!-- end contact list M -->

                        <div class="mt-3">
                            <div class="p-3 fw-bold text-primary">
                                O
                            </div>

                            <ul class="list-unstyled contact-list">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Ossie Wilson</h5>
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <!-- end contact list O -->

                        <div class="mt-3">
                            <div class="p-3 fw-bold text-primary">
                                P
                            </div>

                            <ul class="list-unstyled contact-list">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Phillis Griffin</h5>
                                        </div>

                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Paul Haynes</h5>
                                        </div>

                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <!-- end contact list P -->

                        <div class="mt-3">
                            <div class="p-3 fw-bold text-primary">
                                R
                            </div>

                            <ul class="list-unstyled contact-list">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Rocky Jackson</h5>
                                        </div>

                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <!-- end contact list R -->

                        <div class="mt-3">
                            <div class="p-3 fw-bold text-primary">
                                S
                            </div>

                            <ul class="list-unstyled contact-list">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Sara Muller</h5>
                                        </div>

                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Simon Velez</h5>
                                        </div>

                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Steve Walker</h5>
                                        </div>

                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i
                                                        class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i
                                                        class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i
                                                        class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <!-- end contact list S -->
                    </div>
                    <!-- end contact lists -->
                </div>
                <!-- Start Contact content -->
            </div>
            <!-- End contacts tab-pane -->

            <!-- Start settings tab-pane -->
            <div class="tab-pane" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab">
                <!-- Start Settings content -->
                <div>
                    <div class="px-4 pt-4">
                        <h4 class="mb-0">Settings</h4>
                    </div>

                    <div class="text-center border-bottom p-4">
                        <div class="mb-4 profile-user">
                            <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail"
                                 alt="">
                            <button type="button"
                                    class="btn btn-light bg-light avatar-xs p-0 rounded-circle profile-photo-edit">
                                <i class="ri-pencil-fill"></i>
                            </button>
                        </div>

                        <h5 class="font-size-16 mb-1 text-truncate">Patricia Smith</h5>
                        <div class="dropdown d-inline-block mb-1">
                            <a class="text-muted dropdown-toggle pb-1 d-block" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Available <i class="mdi mdi-chevron-down"></i>
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Available</a>
                                <a class="dropdown-item" href="#">Busy</a>
                            </div>
                        </div>
                    </div>
                    <!-- End profile user -->

                    <!-- Start User profile description -->
                    <div class="p-4 user-profile-desc" data-simplebar>
                        <div id="settingprofile" class="accordion">
                            <div class="accordion-item card border mb-2">
                                <div class="accordion-header" id="personalinfo1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#personalinfo" aria-expanded="true"
                                            aria-controls="personalinfo">
                                        <h5 class="font-size-14 m-0">Personal Info</h5>
                                    </button>
                                </div>
                                <div id="personalinfo" class="accordion-collapse collapse show"
                                     aria-labelledby="personalinfo1" data-bs-parent="#settingprofile">
                                    <div class="accordion-body">
                                        <div class="float-end">
                                            <button type="button" class="btn btn-light btn-sm"><i
                                                    class="ri-edit-fill me-1 ms-0 align-middle"></i> Edit
                                            </button>
                                        </div>

                                        <div>
                                            <p class="text-muted mb-1">Name</p>
                                            <h5 class="font-size-14">Patricia Smith</h5>
                                        </div>

                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Email</p>
                                            <h5 class="font-size-14">adc@123.com</h5>
                                        </div>

                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Time</p>
                                            <h5 class="font-size-14">11:40 AM</h5>
                                        </div>

                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Location</p>
                                            <h5 class="font-size-14 mb-0">California, USA</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end personal info card -->

                            <div class="accordion-item card border mb-2">
                                <div class="accordion-header" id="privacy1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#privacy" aria-expanded="false" aria-controls="privacy">
                                        <h5 class="font-size-14 m-0">Privacy</h5>
                                    </button>
                                </div>
                                <div id="privacy" class="accordion-collapse collapse" aria-labelledby="privacy1"
                                     data-bs-parent="#settingprofile">
                                    <div class="accordion-body">
                                        <div class="py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="font-size-13 mb-0 text-truncate">Profile photo</h5>
                                                </div>
                                                <div class="dropdown ms-2 me-0">
                                                    <button class="btn btn-light btn-sm dropdown-toggle w-sm"
                                                            type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        Everyone <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Everyone</a>
                                                        <a class="dropdown-item" href="#">selected</a>
                                                        <a class="dropdown-item" href="#">Nobody</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-3 border-top">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="font-size-13 mb-0 text-truncate">Last seen</h5>

                                                </div>
                                                <div class="ms-2 me-0">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input"
                                                               id="privacy-lastseenSwitch" checked>
                                                        <label class="form-check-label"
                                                               for="privacy-lastseenSwitch"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="py-3 border-top">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="font-size-13 mb-0 text-truncate">Status</h5>
                                                </div>
                                                <div class="dropdown ms-2 me-0">
                                                    <button class="btn btn-light btn-sm dropdown-toggle w-sm"
                                                            type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        Everyone <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Everyone</a>
                                                        <a class="dropdown-item" href="#">selected</a>
                                                        <a class="dropdown-item" href="#">Nobody</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="py-3 border-top">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="font-size-13 mb-0 text-truncate">Read receipts</h5>
                                                </div>
                                                <div class="ms-2 me-0">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input"
                                                               id="privacy-readreceiptSwitch" checked>
                                                        <label class="form-check-label"
                                                               for="privacy-readreceiptSwitch"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="py-3 border-top">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="font-size-13 mb-0 text-truncate">Groups</h5>

                                                </div>
                                                <div class="dropdown ms-2 me-0">
                                                    <button class="btn btn-light btn-sm dropdown-toggle w-sm"
                                                            type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        Everyone <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Everyone</a>
                                                        <a class="dropdown-item" href="#">selected</a>
                                                        <a class="dropdown-item" href="#">Nobody</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end privacy card -->

                            <div class="accordion-item card border mb-2">
                                <div class="accordion-header" id="security1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#security" aria-expanded="false" aria-controls="security">
                                        <h5 class="font-size-14 m-0"></i> Security</h5>
                                    </button>
                                </div>
                                <div id="security" class="accordion-collapse collapse" aria-labelledby="security1"
                                     data-bs-parent="#settingprofile">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-13 mb-0 text-truncate">Show security
                                                    notification</h5>

                                            </div>
                                            <div class="ms-2 me-0">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input"
                                                           id="security-notificationswitch">
                                                    <label class="form-check-label"
                                                           for="security-notificationswitch"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end security card -->

                            <div class="accordion-item card border mb-2">
                                <div class="accordion-header" id="help1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour">
                                        <h5 class="font-size-14 m-0"></i> Help</h5>
                                    </button>
                                </div>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="help1"
                                     data-bs-parent="#settingprofile">
                                    <div class="accordion-body">
                                        <div class="py-3">
                                            <h5 class="font-size-13 mb-0"><a href="#" class="text-body d-block">FAQs</a>
                                            </h5>
                                        </div>
                                        <div class="py-3 border-top">
                                            <h5 class="font-size-13 mb-0"><a href="#"
                                                                             class="text-body d-block">Contact</a></h5>
                                        </div>
                                        <div class="py-3 border-top">
                                            <h5 class="font-size-13 mb-0"><a href="#" class="text-body d-block">Terms &
                                                    Privacy policy</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end profile-setting-accordion -->
                    </div>
                    <!-- End User profile description -->
                </div>
                <!-- Start Settings content -->
            </div>
            <!-- End settings tab-pane -->
        </div>
        <!-- end tab content -->

    </div>
    <!-- end chat-leftsidebar -->
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

</body>
</html>
