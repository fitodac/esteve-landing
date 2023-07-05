<script setup>
defineProps(['message']);
</script>

<template>
	<div v-show="message">
		<p class="text-xs text-red-700">{{ message }}</p>
	</div>
</template>
