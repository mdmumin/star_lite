<script setup>
import { ref, onMounted, watch } from "vue";
import $ from "jquery";

const props = defineProps(["modelValue"]);
const emit = defineEmits(["update:modelValue"]);

const editorRef = ref(null);

onMounted(() => {
  $(editorRef.value).summernote({
    placeholder: "Write here...",
    height: 200,
    toolbar: [
      ["style", ["bold", "italic", "underline", "clear"]],
      ["font", ["strikethrough", "superscript", "subscript"]],
      ["para", ["ul", "ol", "paragraph"]],
      ["insert", ["link", "picture", "video"]],
      ["view", ["fullscreen", "codeview", "help"]],
    ],
    callbacks: {
      onChange: function (contents) {
        emit("update:modelValue", contents);
      },
    },
  });

  // Update Summernote when prop changes
  watch(
    () => props.modelValue,
    (newValue) => {
      $(editorRef.value).summernote("code", newValue);
    }
  );
});
</script>

<template>
  <textarea ref="editorRef"></textarea>
</template>
