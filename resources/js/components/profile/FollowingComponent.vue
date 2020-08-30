<template>
  <div>

    <div class="container">
    	<div class="row">
    		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    			<div class="ui-block responsive-flex">
    				<div class="ui-block-title">
    					<div class="h6 title">{{user.display_name}}’s Following ({{followings.length}})</div>
    					<form class="w-search">
    						<div class="form-group with-button is-empty">
    							<input class="form-control" type="text" placeholder="Search Friends...">
    							<button>
    								<svg class="olymp-magnifying-glass-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
    							</button>
    						<span class="material-input"></span></div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>


    <div class="container">
    	<div class="row">

    		<!-- Main Content -->

    		<div class="col col-xl-12 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
    			<div id="newsfeed-items-grid">
    				<!-- Friends -->
    				<div class="row list-follow" v-if="followings.length > 0">

    					<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12" v-for="following in followings">
    						<div class="ui-block">

    							<!-- Friend Item -->
    							<div class="friend-item">
    								<div class="friend-header-thumb">
    									<img v-bind:src="following.cover_image" alt="friend">
    								</div>
    								<div class="friend-item-content">
    									<div class="more">
    										<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
    										<ul class="more-dropdown">
    											<li>
    												<a href="#">Report Profile</a>
    											</li>
    											<li>
    												<a href="#">Block Profile</a>
    											</li>
    										</ul>
    									</div>
    									<div class="friend-avatar">
    										<div class="author-thumb">
    											<img v-bind:src="following.image" alt="author">
    										</div>
    										<div class="author-content">
    											<a href="#" class="h5 author-name">a7med Ibrahim</a>
    										</div>
    										<span>You Following him Since {{ following.created_at | moment("from", "now") }} </span>
    										<span>{{following.created_at}}</span>
    									</div>
    									<a href="#" class="btn bg-grey-lighter">
    										<i class="fa fa-times"></i>
    										Unfollowing
    									</a>
    								</div>
    							</div>
    							<!-- ... end Friend Item -->
    						</div>
    					</div>

    				</div>
    				<!-- ... end Friends -->
    			</div>
    			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
    				<svg class="olymp-three-dots-icon">
    					<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
    				</svg>
    			</a>
    		</div>

    		<!-- ... end Main Content -->



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
            friendshipAt: '',

            followings: '',

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


          getFollowings(){
            axios.get('/profile/followings/'+this.user.id)
              .then(response => {
                this.followings = response.data
              })
              .catch(errer => {

              });
          }
        },
        // Echo.private('notification')
        //     .listen('event-name', (e) => {
        //
        //     });

        created() {
          this.checkFriendship();
          this.checkFollow();
          this.getFollowings();
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
