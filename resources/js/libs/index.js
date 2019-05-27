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
	getFiles: API_URL + 'getFiles/',
	saveKeyPoints: API_URL + 'security-flow/step-4/create/keyPoints',
	blurKeyPoints: API_URL + 'security-flow/blur/keypoints'
};
