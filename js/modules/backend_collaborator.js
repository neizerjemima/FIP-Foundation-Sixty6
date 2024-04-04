export function backend_collaborator() {
    const collaborator = Vue.createApp({
        created() {
            console.log("created lifecycle hook called");
            fetch("http://localhost/backend_fip/public/collaborators")
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    this.collaboratorsData = data; 
                })
                .catch(error => {
                    console.log(error);
                });
        },
    
        
        data() {
            return {
                collaboratorsData: [],
                error: ""
            };
        },
    
        methods: {

        }
    });
    
    collaborator.mount("#colaborators");
}
