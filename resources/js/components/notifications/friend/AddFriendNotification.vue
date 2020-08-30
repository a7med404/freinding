<template lang="html">
	<div class="control-icon more has-items">
		<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
		<div class="label-avatar bg-blue">{{notifications.length}}</div>

		<div class="more-dropdown more-with-triangle triangle-top-center">
			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">FRIEND REQUESTS</h6>
			</div>

			<div class="mCustomScrollbar" data-mcs-theme="dark">

				<ul class="notification-list friend-requests">
          <li class="un-read" v-if="notifications.length > 0" v-for="notification in notifications" @click="MarkAsRead(notification.id)">
            <div class="author-thumb">
              <img v-bind:src="notification.data.user.image" alt="author">
            </div>
            <div class="notification-event">
              <div><a v-bind:href="'/profile/@'+ notification.data.user.slug" class="h6 notification-friend  text-capitalize">{{ notification.data.user.name }}</a> sent to you friend request.</div>
              <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">{{ notification.created_at | moment("from", "now") }}</time></span>
            </div>
            <span class="notification-icon">
              <button @click.prevent="acceptFriendRequest(notification)" class="accept-request">
                <span class="without-text">
                  <i class="fa fa-check"></i>
                </span>
              </button>
              <button @click.prevent="deleteFriendRequest(notification)" class="accept-request request-del">
                <span class="">
                  <i class="fa fa-times"></i>
                </span>
              </button>
            </span>
          </li>
          </li v-else>
            <span class="text-center h5">There is no notifications.</span>
          </li>
				</ul>
			</div>
			<a href="/notifications/all" class="view-all bg-blue">View All</a>
		</div>
  </div>
</template>

<script>
export default {
  mounted() {
      console.log('Component mounted.')

  },
  data() {
    return {
			notifications: '',
      notification: '',
    }
  },
  props: [
    // 'notifications'
  ],
  async created() {
    this.getNotifications();
    // var userId = $('meta[name="userId"]').attr('content');

		// let s = Echo.channel('whatsappqatar-channel')
    // .listen('.AddFriendEvent', (e) => {
    //     console.log(e);
    // });
    // Echo.private('App.User.' + userId).notification((notification) => {
		//
    //   this.notifications.push(notification);
    //   alert(notification);
    //   console.log(notification);
    // });

			 var userId = $('meta[name="userId"]').attr('content');
			 Echo.private('App.User.' + userId).notification((notification) => {
					 this.notifications.push(notification);
				   this.getNotifications();
			 });

		// Echo.channel('.' + userId).notification((notification) => {
		//
		// 	this.notifications.push(notification);
		// 	alert(notification);
		// 	console.log(notification);
		// });



  },
  methods: {
    getNotifications: function(){
        axios.get('/notifications/get').then(response => {
        this.notifications = response.data;
      });
    },

		deleteFriendRequest: function(notification){
			var data = {
        id: notification.data.user.id,
      };
			axios.delete('profile/delete-friendship/'+ notification.data.user.id, data)
				.then(response => {
			    this.getNotifications();
					// this.MarkAsRead(notification.id);
					console.log(response);
				}).
				catch(error => {
	        console.log(error);
				});
		},


		acceptFriendRequest: function(notification){
			var data = {
        id: notification.data.user.id,
      };
			axios.post('profile/accept-friend/'+ notification.data.user.id, data)
				.then(response => {
			    this.getNotifications();
					// this.MarkAsRead(notification.id);
					console.log(response);
				}).
				catch(error => {
	        console.log(error);
				});
		},

    MarkAsRead: function(notificationId){
      var data = {
        id: notificationId,
      };
      axios
      .post('/notifications/read', data)
      .then(response => {
				console.log("readed"+ response);
      })
      .catch(error => {
        console.log(error);
      });
    }
  }
}
</script>

<style lang="css">

</style>
