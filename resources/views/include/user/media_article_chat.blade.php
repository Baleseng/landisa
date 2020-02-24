
<div id="chats">

  <div class="chat-wrapper">
    
    <div class="chat-user-col">
      
      <div class="chat-box-wrap">
        <div class="chat-box-title" id="toggle-contacts-btn"><i class="fa fa-comments"></i> Chat Room</div>
      </div>

      <div id="chat-contacts">
        <div class="chat-box-btn">
          <span class="chat-btn fa fa-users"></span>
          <span class="chat-btn fa fa-cog"></span>
        </div>

        <span class="chat-user-search">
          <i id="filtersubmit" name="submit" class="fa fa-search"></i>
          <input type="text" class="searchnews" id="search" name="search" placeholder="Search" autocomplete="off"/>
        </span>

        <div class="list-group" id="y-scroll">
          @foreach($user as $chatuser)
            <div class="list-group-wrap">
              <div class="list-group-img"><img src="https://user.triwink.app/images/profile/users/{{ $chatuser->avator }}" class="fa fa-user"/></div>
              <div v-on:click="getUserId" class="list-group-item" id="{{ $chatuser->id }}" value="{{ $chatuser->name }}">{{ $chatuser->name }}</div>
            </div>
          @endforeach
        </div>
      </div>

    </div>

    <div class="chat-message-col">
      
        <div class="chat-message" v-for="(chatWindow,index) in chatWindows" v-bind:sendid="index.senderid" v-bind:name="index.name">
          <div class="panel panel-primary">
            
            <div class="panel-heading">
              <i class="fa fa-comments"></i> @{{chatWindow.name}}
              <button class="panel-close-btn" v-on:click="$emit('close')"><i class="fa fa-close"></i></button>
            </div>
            
            <div class="panel-collapse" id="collapseOne">
              <div class="panel-body" id="y-scroll">
                <ul class="chat" id="chat">
                  <li class="left clearfix" v-for="chat in chats[chatWindow.senderid]" v-bind:message="chat.message" v-bind:username="chat.username">
                    <span class="chat-img pull-left">
                      <img src="https://user.triwink.app/images/profile/users/{{ $chatuser->avator }}" alt="User Avatar" class="img-circle">
                    </span>
                    <div class="chat-body clearfix">
                      
                      <div class="header">
                        <strong class="primary-font"> @{{chat.name}}</strong> 
                      </div>
                      
                      <p v-if="">@{{chat.message}} </p>
                    
                    </div>
                  </li>                                
                </ul>
              </div>
              
              <div class="panel-footer">
                <div class="input-group row">

                  <div class="input-article">
                    <div class="article-img">
                      <img class="fa fa-file-image" src="https://writer.triwink.app/images/articles/{{$content->article_img}}"/>
                    </div>
                    <div class="article-title">{{ $content->title }}</div>
                  </div>

                  <input :id="chatWindow.senderid" v-model="chatMessage[chatWindow.senderid]" v-on:keyup.enter="sendMessage" type="text" class="form-control input-md" placeholder="Type your message here..."/>

                  <div class="input-group-btn">
                    <button :id="chatWindow.senderid" class="btn btn-warning btn-md" v-on:click="sendMessage"><i class="fa fa-comments"></i> Send</button>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      
    </div>
  </div>

</div>
