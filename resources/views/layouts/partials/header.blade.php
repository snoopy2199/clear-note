<div id="header">
    <div id="header_main" class="row">
        <a id="header_title" class="col-md-2" href="\">
            Clear Note
        </a>
        @if (!Auth::check())
            <div id="header_login" class="col-md-1 col-md-offset-8 header-link"
                 data-toggle="modal" data-target="#loginModal">
                登入
            </div>
        @else
            <div id="header_logout" class="col-md-1 col-md-offset-8 header-link">
                登出
            </div>
        @endif
        <a id="header_sign_up" class="col-md-1 header-link"
           data-toggle="modal" data-target="#registrationModal">
            註冊
        </a>
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
                    <form action="/api/login" method="post" class="form-horizontal" role="form">
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
                    <h4 class="modal-title" id="registrationModal">註冊</h4>
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