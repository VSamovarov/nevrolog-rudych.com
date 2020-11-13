export default function(loader) {
    this.loader = loader;
    this.upload = async () => {
        let uploadedFile = await this.loader.file;

        const data = new FormData();
        data.append("file", uploadedFile);

        try {
            let response = await axios.post(`${HOST}/api/editor/file/`, data, {
                headers: {
                    "Content-Type": "multipart/form-data;"
                }
            });
            if (response.data.result == "success") {
                return {
                    default: response.data.url
                };
            } else {
                return response.data.message;
            }
        } catch (e) {
            console.log(e);
        }
    };
    this.abort = () => {
        console.log("Abort upload.");
    };
}
