function delete_comment(comment_id) {
  if(confirm("本当に削除しますか？")){
    window.location.href = "/comments/" & comment_id;
  }
}