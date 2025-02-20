<template>
  <div class="genealogy-tree">
    <div v-if="data">
      <tree-node :node="data" @node-click="loadChildren" />
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import TreeNode from './TreeNode.vue';

export default {
  components: {
    TreeNode
  },
  props: {
    data: Object
  },
  methods: {
    loadChildren(parentId) {
      axios.get(`/genealogy/${parentId}`).then(response => {
        this.$emit('update:data', response.data);  // Emit event to parent to update data
      });
    }
  }
};
</script>
