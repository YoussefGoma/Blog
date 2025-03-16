<template>
    <div>
        <button @click="fetchPost" class="px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
            View Post
        </button>
      <div v-if="isOpen" class="fixed inset-0 bg-gray-100/50 bg-opacity-0  flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-2/3">
          <h2 class="text-meduim font-bold text-gray-800">{{ post.title }}</h2>
          <p class="text-gray-600 mt-2 break-words whitespace-normal">{{ post.description }}</p>
  
          <div class="mt-4">
            <p class="text-sm text-gray-700 m-2"><strong>Author:</strong> {{ post.user.name }}</p>
            <p class="text-sm text-gray-700 m-2"><strong>Email:</strong> {{ post.user.email }}</p>
          </div>
  
          <button @click="isOpen = false" class="mt-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
            Close
          </button>
        </div>
      </div>
    </div>
</template>
  
<script>
import axios from 'axios';
  
  export default {
    props: ['postslug'],
    data() {
      return {
        isOpen: false,
        post: {}
      };
    },
    methods: {
      fetchPost() {
        axios.get(`/posts/${this.postslug}`)
          .then(response => {
            const data = response.data;
            this.post = data;
            this.isOpen = true;
          })
          .catch(error => {
            console.error('Error fetching post:', error);
          });
      }
    }
  };
</script>
  