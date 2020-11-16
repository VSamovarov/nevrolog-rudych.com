export default class UploadAdapter {
  constructor(loader, route, inputName = "image") {
    // The file loader instance to use during the upload.
    this.loader = loader;
    this.route = route;
    this.inputName = inputName;
    //Реализуем возможность прерывания запроса.
    this.cancelToken = axios.CancelToken;
    this.source = this.cancelToken.source();
  }

  async upload() {
    const file = await this.loader.file;
    const formData = new FormData();
    formData.append(this.inputName, file);
    try {
      const { data } = await axios.post(this.route, formData, {
        headers: {
          "Content-Type": "multipart/form-data"
        }
      });
      return {
        default: data
      };
    } catch (e) {
      throw e;
    }
  }
  abort() {
    //Прерываем запрос
    this.source.cancel("Загрузка изображения прервана");
  }
}
