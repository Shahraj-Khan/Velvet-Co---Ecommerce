<template>
    <div class="not-found">
      <h1>404 - Page Not Found</h1>
      <p>Oops! The page you requested could not be found.
Go Home</p>
      <router-link to="/">Return to home page</router-link>
    </div>
  </template>
  
  <script>
  export default {
    name: "NotFound",
  };
  </script>
  
  <style scoped>
  .not-found {
    text-align: center;
    padding: 50px;
  }
  
  h1 {
    font-size: 36px;
    color: #ff0000;
  }
  
  p {
    font-size: 18px;
  }
  
  router-link {
    color: #007bff;
    text-decoration: none;
    font-size: 18px;
  }
  
  router-link:hover {
    text-decoration: underline;
  }
  </style>
  