<div id="header">
    <div id="header_main" class="row">
        <a id="header_title" class="col-md-2" href="\">
            Clear Note
        </a>
        @if (Auth::check())
            <div class="col-md-1 col-md-offset-9">
                <li id="header_list">
                    <div class="dropdown">
                        <div id="dropdown_btn" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            @if (Auth::user()->image)
                                <img id="user_icon" src='{{ "data:image/png;base64, " }}' height="35">
                            @else
                                <img id="user_icon" src='{{ asset('img/image_user.png') }}' height="35">
                            @endif
                            <span class="caret"></span>
                        </div>
                        <ul id="dropdown_list" class="dropdown-menu" role="menu" aria-labelledby="dropdown_btn">
                            <li role="presentation">
                                <a href="/" role="menuitem" class="dropdown_item">我的書架</a>
                            </li>
                            <li role="presentation">
                                <a href="/setting" role="menuitem" class="dropdown_item">個人設定</a>
                            </li>
                            <li role="presentation">
                                <a href="/logout" role="menuitem" class="dropdown_item">登出</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </div>
        @else
            <div id="header_login" class="col-md-1 col-md-offset-8 header-link"
                 data-toggle="modal" data-target="#loginModal">
                登入
            </div>
            <a id="header_sign_up" class="col-md-1 header-link"
               data-toggle="modal" data-target="#registrationModal">
                註冊
            </a>
        @endif
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog"
         aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">關閉</span>
                    </button>
                    <h4 class="modal-title" id="loginModalLabel">登入</h4>
                </div>
                <div class="modal-body">
                    <form action="/login" method="post" class="form-horizontal" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="login_inputEmail" class="col-sm-2 control-label">電子郵件</label>
                            <div class="col-sm-9">
                                <input id="login_inputEmail" type="email" name="email"
                                       class="form-control"  placeholder="電子郵件" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="login_inputPassword" class="col-sm-2 control-label">密碼</label>
                            <div class="col-sm-9">
                                <input id="login_inputPassword" type="password" name="password"
                                       class="form-control"  placeholder="密碼" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> 記住我
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-2">
                                <button type="submit" class="btn btn-default">登入</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Modal -->
    <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog"
         aria-labelledby="registrationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">關閉</span>
                    </button>
                    <h4 class="modal-title" id="registrationModalLabel">註冊</h4>
                </div>
                <div class="modal-body">
                    <form id="regist_form" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="regist_inputEmail" class="col-sm-2 control-label">
                                電子郵件
                            </label>
                            <div class="col-sm-9">
                                <input id="regist_inputEmail" type="email" name="email"
                                       class="form-control"  placeholder="電子郵件" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-2">
                                <button id="regist_button" type="submit" class="btn btn-default">
                                    註冊
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>