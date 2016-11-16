var USER_ID;

var nowBookEle;
var nowBookContent;
var nowNoteEle;

var nowBookId;
var nowNoteId;

$(document).ready(function(){
    $("#create_book_form").submit( function(event) {
        var title = $('#book_inputTitle').val().trim();
        createBook(title);

        // don't do submit
        event.preventDefault();
    });

    $("#create_note_form").submit( function(event) {
        var title = $('#note_inputTitle').val().trim();
        createNote(title);

        // don't do submit
        event.preventDefault();
    });
});

function showCreateBook(userId) {
    USER_ID = userId;
    $('#createBookModal').modal('show');
}

function createBook(title) {
    $.ajax({
        url: '/api/book',
        type: 'POST',
        data: {
            user_id: USER_ID,
            title: title
        },
        success: function(response) {
            alert('新增成功');
            location.reload();
        },
        error: function (response) {
            alert(response.responseJSON.msg);
        }
    });
}

function createNote(title) {
    $.ajax({
        url: '/api/note',
        type: 'POST',
        data: {
            book_id: nowBookId,
            title: title
        },
        success: function(response) {
            alert('新增成功');
            location.reload();
        },
        error: function (response) {
            alert(response.responseJSON.msg);
        }
    });
}

function showCreateNote(bookId) {
    nowBookId = bookId;
    $('#createNoteModal').modal('show');
}

function openBook(bookId, bookEleId) {
    if (nowBookEle) {
        nowBookEle.removeClass("book-selected");
        nowBookContent.hide();

        if (nowNoteEle) {
            nowNoteEle.removeClass("note-selected");
            $('#note_btn_group').hide();
        }
    }
    $('#book_btn_group').show();
    nowBookId = bookId;
    nowBookEle = $('#' + bookEleId);
    nowBookEle.addClass("book-selected");
    nowBookContent = $('#' + bookEleId + '_content');
    nowBookContent.show();
}

function selectNote(noteId, noteEleId) {
    if (nowNoteEle) {
        nowNoteEle.removeClass("note-selected");
    }
    $('#note_btn_group').show();
    nowNoteId = noteId;
    nowNoteEle = $('#' + noteEleId);
    nowNoteEle.addClass("note-selected");
}