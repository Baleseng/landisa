<template>
  <div class="comments-app">
    
    <div class="comment-disclaimer">
      <h4>Share your comment</h4>
      <span>We reserve editorial discretion to share comments. Read our comments policy for guidelines on contributions.</span>
    </div>
  
     <!-- From -->
    <div class="comment-form" v-if="user">
      <!-- Comment Avatar -->
      <div class="comment-avatar">
        <img :src="'https://user.triwink.app/images/users/' + user.avator" class="fa fa-user">
      </div>

      <form class="first-form" name="form">
        <div class="form-row">
          <textarea class="inputext" placeholder="Add comment..." required v-model="message"></textarea            
          <span class="input" v-if="errorComment" style="color:red">{{errorComment}}</span>
        </div>
        <input type="hidden" disabled :value="user.name">
        
        <input type="button" class="btn btn-success" style="background:#f26522; color:#333;"  @click="saveComment" value="Comment"/>
      </form>
    </div>

    <!-- Comments List -->
    <div class="comments" v-if="comments" v-for="(comment,index) in commentsData">
      <!-- Comment -->
      <div v-if="!spamComments[index] || !comment.spam" class="comment">
        <!-- Comment Avatar -->
        <div class="comment-avatar"><img src="https://user.triwink.app/images/users/" class="fa fa-user"></div>
        <!-- Comment Box -->
        <div class="comment-box">
          <div class="comment-text">{{comment.comment}}</div>
          <div class="comment-footer">
            <div class="comment-info">
              <span class="comment-author">{{comment.name}}</span>
              <span class="comment-date">{{comment.date}}</span>
            </div>
            <div class="comment-actions">
              <ul class="list">
                <li>
                  <span class="comment-counter">Votes: {{comment.votes}}</span>
                  <a v-if="!comment.votedByUser" v-on:click="voteComment(comment.commentid,'directcomment',index,0,'up')">
                    <i class="fa fa-thumbs-up"></i>
                  </a>
                  <a v-if="!comment.votedByUser" v-on:click="voteComment(comment.commentid,'directcomment',index,0,'down')">
                    <i class="fa fa-thumbs-down"></i>
                  </a>
                </li>
                <li>
                  <a v-on:click="spamComment(comment.commentId,'directcomment',index,0)">
                    <i class="fa fa-flag"></i>
                  </a>
                </li>
                <li>
                  <a v-on:click="openComment(index)">
                    <i class="fa fa-reply"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- From -->
        <div class="comment-form comment-v" v-if="commentBoxs[index]">
          <!-- Comment Avatar -->
          <div class="comment-avatar"><img src="https://user.triwink.app/images/users/" class="fa fa-user"></div>

          <form class="form" name="form">
            <div class="form-row">
              <textarea class="inputext" placeholder="Add comment..." required v-model="message"></textarea>
              <span class="input" v-if="errorReply" style="color:red">{{errorReply}}</span>
            </div>
            <input type="hidden" :value="user.name">
            <input type="button" class="btn btn-success" v-on:click="replyComment(comment.commentid,index)" value="Reply">
          </form>
        </div>



        <!-- Comment - Reply -->
        <div v-if="comment.replies">
          <div class="comments" v-for="(replies,index2) in comment.replies">
            <div v-if="!spamCommentsReply[index2] || !replies.spam" class="comment reply">
              <!-- Comment Avatar -->
              <div class="reply-avatar"><img src="" class="fa fa-user"></div>
              <!-- Comment Box -->
              <div class="reply-box">
                <div class="reply-text">{{replies.comment}}</div>
                <div class="reply-footer">
                  <div class="reply-info">
                    <span class="reply-author">{{replies.name}}</span>
                    <span class="reply-date">{{replies.date}}</span>
                  </div>
                  <div class="reply-actions">
                    <ul class="list">
                      <li>
                        <span class="reply-counter">Votes: {{replies.votes}}</span>
                        <a v-if="!replies.votedByUser" v-on:click="voteComment(replies.commentid,'replycomment',index,index2,'up')">
                          <i class="fa fa-thumbs-up"></i>
                        </a>
                        <a v-if="!replies.votedByUser" v-on:click="voteComment(comment.commentid,'replycomment',index,index2,'down')">
                          <i class="fa fa-thumbs-down"></i>
                        </a>
                        </li>
                        <li>
                          <a v-on:click="spamComment(replies.commentid,'replycomment',index,index2)">
                            <i class="fa  fa-flag"></i>
                          </a>
                        </li>
                        <li>
                          <a v-on:click="replyCommentBox(index2)">
                            <i class="fa fa-reply"></i>
                          </a>
                        </li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- From -->
              <div class="reply-form" v-if="replyCommentBoxs[index2]">
                <!-- Comment Avatar -->
                <div class="reply-avatar"><img src="" class="fa fa-user"></div>

                <form class="form" name="form">
                  <div class="form-row">
                    <textarea class="inputext" placeholder="Add comment..." required v-model="message"></textarea>
                    <span class="input" v-if="errorReply" style="color:red">{{errorReply}}</span>
                  </div>
                  <input type="hidden" :value="user.name">
                  <div class="form-row"><input type="button" class="btn btn-success" v-on:click="replyComment(comment.commentid,index)" value="Reply"></div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  var _ = require('lodash');
  export default {
    props: ['commentUrl'],
    data() {
      return {
        comments: [],
        commentreplies: [],
        comments: 0,
        commentBoxs: [],
        message: null,
        replyCommentBoxs: [],
        commentsData: [],
        viewcomment: [],
        show: [],
        spamCommentsReply: [],
        spamComments: [],
        errorComment: null,
        errorReply: null,
        user: window.user
      }
    },
    http: {
      headers: { 'X-CSRF-TOKEN': window.csrf}
    },
    methods: {

      saveComment() {
        if (this.message != null && this.message != ' ') {
          this.errorComment = null;
          this.$http.post('comments', {
            page_id: this.commentUrl,
            comment: this.message,
            users_id: this.user.id
          }).then(res => {
            if (res.data.status) {
              this.commentsData.push({ 
                //"commentid": res.data.commentId, 
                "name": this.user.name, 
                "region": this.region,
                "comment": this.message,
                "votes": 0, 
                "reply": 0, 
                "replies": [] 
              });
              this.message = null;
            }
          });
        } else {
          this.errorComment = "Please enter a comment to save...";
        }
      },
      
      fetchComments() {
        this.$http.get('comments/' + this.commentUrl).then(res => {
          this.commentData = res.data;
          this.commentsData = _.orderBy(res.data, ['votes'], ['desc']);
          this.comments = 1;
        });     
      },

      showComments(index) {
        if (!this.viewcomment[index]) {
          Vue.set(this.show, index, "hide");
          Vue.set(this.viewcomment, index, 1);
        } else {
          Vue.set(this.show, index, "view");
          Vue.set(this.viewcomment, index, 0);
        }
      },

      openComment(index) {
        if (this.user) {
          if (this.commentBoxs[index]) {
            Vue.set(this.commentBoxs, index, 0);
          } else {
            Vue.set(this.commentBoxs, index, 1);
          }
        }
      },

      replyCommentBox(index) {
        if (this.user) {
          if (this.replyCommentBoxs[index]) {
            Vue.set(this.replyCommentBoxs, index, 0);
          } else {
            Vue.set(this.replyCommentBoxs, index, 1);
          }
        }
      },

      replyComment(commentId, index) {
        if (this.message != null && this.message != ' ') {
          this.errorReply = null;
          this.$http.post('comments', {
            comment: this.message,
            users_id: this.user.id,
            reply_id: commentId
          }).then(res => {
            if (res.data.status) {
              if (!this.commentsData[index].reply) {
                this.commentsData[index].replies.push({ 
                  "commentid": res.data.commentId, 
                  "name": this.user.name, 
                  "comment": this.message, 
                  "votes": 0 
                });
                this.commentsData[index].reply = 1;
                Vue.set(this.replyCommentBoxs, index, 0);
                Vue.set(this.commentBoxs, index, 0);
              } else {
                this.commentsData[index].replies.push({ 
                  "commentid": res.data.commentId, 
                  "name": this.user.name, 
                  "comment": this.message, 
                  "votes": 0 
                });
                Vue.set(this.replyCommentBoxs, index, 0);
                Vue.set(this.commentBoxs, index, 0);
              }
              this.message = null;
            }
          });
        } else {
          this.errorReply = "Please enter a comment to save";
        }
      },

      voteComment(commentId, commentType, index, index2, voteType) {
        if (this.user) {
          this.$http.post('comments/' + commentId + '/vote', {
            users_id: this.user.id,
            vote: voteType
          }).then(res => {
            if (res.data) {
              if (commentType == 'directcomment') {
                if (voteType == 'up') {
                  this.commentsData[index].votes++;
                } else if (voteType == 'down') {
                  this.commentsData[index].votes--;
                }
              } else if (commentType == 'replycomment') {
                if (voteType == 'up') {
                  this.commentsData[index].replies[index2].votes++;
                } else if (voteType == 'down') {
                  this.commentsData[index].replies[index2].votes--;
                }
              }
            }
          });
        }
      },

      spamComment(commentId, commentType, index, index2) {
        console.log("spam here");
        if (this.user) {
          this.$http.post('comments/' + commentId + '/spam', {
            users_id: this.user.id,
          }).then(res => {
            if (commentType == 'directcomment') {
              Vue.set(this.spamComments, index, 1);
              Vue.set(this.viewcomment, index, 1);
            } else if (commentType == 'replycomment') {
              Vue.set(this.spamCommentsReply, index2, 1);
            }
          });
        }
      },

    },
    mounted() {
      console.log("mounted");
      this.fetchComments();
    }
  }
</script>