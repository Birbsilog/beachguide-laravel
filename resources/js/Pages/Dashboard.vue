<script>
import AppLayout from "@/Layouts/AppLayout.vue";

export default {
  layout: AppLayout,   // ✅ ensures full screen + aligned UI
};
</script>

<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
    
    <!-- Example button row -->
    <div class="flex gap-4">
      <button class="px-4 py-2 bg-blue-600 text-white rounded">Action 1</button>
      <button class="px-4 py-2 bg-green-600 text-white rounded">Action 2</button>
    </div>
  </div>
</template>
