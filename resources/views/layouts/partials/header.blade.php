<div id="header">
    <div class="row">
        <a id="header_title" class="col-md-2" href="\">
            Clear Note
        </a>
        <div id="header_login" class="col-md-1 col-md-offset-8 header-link" data-toggle="modal" data-target="#myModal">
            登入
        </div>
        <a id="header_sign_up" class="col-md-1 header-link" href="#index_sign_up">
            註冊
        </a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">關閉</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">登入</h4>
                </div>
                <div class="modal-body">
                    <form action="/login" method="post" class="form-horizontal" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">電子郵件</label>
                            <div class="col-sm-10">
                                <input type="email" name="email"
                                       class="form-control" id="inputEmail" placeholder="輸入電子郵件">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">密碼</label>
                            <div class="col-sm-10">
                                <input type="password" name="password"
                                       class="form-control" id="inputPassword" placeholder="密碼">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> 記住我
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
</div>