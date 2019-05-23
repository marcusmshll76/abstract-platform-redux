function getApiUrl() {
	let hn = window.location.hostname;
	if (hn === 'abstract.test') {
		return 'http://abstract.test/'
	} else {
		return 'https://abstract.com/'
	}
}
const API_URL = getApiUrl();
export default {
	////// Retrieve Files
	getFiles: API_URL + 'getFiles/'
};
