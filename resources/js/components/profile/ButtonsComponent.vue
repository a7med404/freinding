<template>
  <div class="buttons container">
  	<div class="row">
  		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  			<div class="ui-block">
  				<!-- Start Buttons section -->
  				<div class="buttons-section">
  					<div class="row">
  						<div class="col col-sm-12 col-12">
  							<ul class="buttons-menu">
  								<li>
                    <button class="btn btn-sm bg-blue"     v-show="add"     @click="addFriend()">   <i class="fa fa-user-plus"></i>Add Friend</button>
                    <button class="btn btn-style bg-grey-lighter" v-show="accept"  @click="acceptFriend()"><i class="fa fa-check"></i>Accept Friend Request</button>
                    <button class="btn btn-style btn-green"  v-show="del"     @click="delFriend()"><i class="fa fa-heart"></i>Friends <small>{{ friendshipAt | moment("from", "now") }}</small></button>
  									<button class="btn btn-style bg-grey"  v-show="sent"    @click="sentFriend()"><i class="fa fa-clock"></i>Friend Request sent</button>
  								</li>
  								<li>
                    <button class="btn btn-follow btn-sm bg-blue"     v-show="follow"     @click="doFollow()">   <i class="fa fa-rss"></i>Follow</button>
                    <button class="btn btn-follow btn-style bg-purple" v-show="reFollow"  @click="doReFollow()"><i class="fa fa-arrow-right"></i>Follow Back</button>
                    <button class="btn btn-follow btn-style btn-green"  v-show="following"     @click="doFollowing()"><i class="fa fa-check"></i>Following</button>
  									<!-- <button class="btn btn-follow btn-style bg-grey"  v-show="sent"    @click="sentFriend()"><i class="fa fa-clock"></i>Friend Request sent</button> -->
  								</li>
  							</ul>
  						</div>
  					</div>
  				</div>
  				<!-- end Buttons section  -->
  			</div>
  		</div>
  	</div>
  </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data: function(){
          return {
            checkFriend: '',
            add: false,
            accept: false,
            del: false,
            sent: false,

            follow: false,
            reFollow: false,
            following: false,
            friendshipAt: ''
          }
        },
        props: [
          'user'
        ],
        methods:{
          addFriend() {
            this.add = false;
            this.sent = true;
            axios.get('/profile/add-friend/'+this.user)
              .then(response => {
                console.log(response);

              })
              .catch(error => {
                console.log(error);
                this.add = true;
                this.sent = false;
              });
          },
          acceptFriend() {
            this.accept = false;
            this.del = true;
            axios.get('/profile/accept-friend/'+this.user)
              .then(response => {
                console.log(response);
              })
              .catch(error => {
                console.log(error);
                this.accept = true;
                this.del = false;
              });
          },
          delFriend() {
              this.del = false;
              this.add = true;
            axios.delete('/profile/delete-friendship/'+this.user)
              .then(response => {
                console.log(response);
              })
              .catch(error => {
                console.log(error);
                this.del = true;
                this.add = false;
              });
          },
          sentFriend() {
            this.sent = false;
            this.add = true;
            axios.delete('/profile/delete-friendship/'+this.user)
              .then(response => {
                this.sent = false;
                this.add = true;
                console.log(response);
              })
              .catch(error => {
                console.log(error);
                  this.sent = true;
                  this.add = false;
              });
          },


          doFollow() {
            this.follow = false;
            this.following = true;
            axios.get('/profile/follow/'+this.user)
              .then(response => {
                console.log(response);

              })
              .catch(error => {
                console.log(error);
                this.follow = true;
                this.following = false;
              });
          },
          doReFollow() {
            this.reFollow = false;
            this.following = true;
            axios.get('/profile/re-follow/'+this.user)
              .then(response => {
                console.log(response);
              })
              .catch(error => {
                console.log(error);
                this.reFollow = true;
                this.following = false;
              });
          },
          doFollowing() {
              this.following = false;
              this.follow = true;
            axios.delete('/profile/un-follow/'+this.user)
              .then(response => {
                console.log(response);
              })
              .catch(error => {
                console.log(error);
                this.following = true;
                this.follow = false;
              });
          },


          checkFriendship() {
            axios.get('/profile/check-friendship/'+this.user)
              .then(response => {
                if(response.data.status == 0){
                  this.add = true;
                }
                else if(response.data.status == 1){
                  this.friendshipAt = response.data.friendship.date;
                  this.del = true;
                }
                else if(response.data.status == 2){
                  this.sent = true;
                }
                else if(response.data.status == 3){
                  this.accept = true;
                }
                else {
                  this.add = true;
                }
              })
              .catch(error => {
                console.log(error);
              });
          },


          checkFollow() {
            axios.get('/profile/check-follow/'+this.user)
              .then(response => {
                if(response.data.status == 1){
                  this.following = true;
                }
                else if(response.data.status == 2){
                  this.reFollow = true;
                }
                else if(response.data.status == 3){
                  this.following = true;
                }
                else if(response.data.status == 4){
                  this.follow = true;
                }
              })
              .catch(error => {
                console.log(error);
              });
          },


        },
        // Echo.private('notification')
        //     .listen('event-name', (e) => {
        //
        //     });

        created() {
          this.checkFriendship();
          this.checkFollow();
          // if(window.location.href.indexOf("@")){
          //   alert(window.location);
          // }
          // var userId = $('meta[name="userId"]').attr('content');
          // axios.get('/profile/check-friend/'+ userId).then(response => {
          //   this.checkFriend = response;
          //   console.log(response);
          // });
        },
    }
</script>
<style lang="sass">
</style>
