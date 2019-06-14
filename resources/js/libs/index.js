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
	host: API_URL,
	getFiles: API_URL + 'getFiles/',
	saveKeyPoints: API_URL + 'security-flow/step-4/create/keyPoints',
	saveFundKeyPoints: API_URL + 'security-flow/blur/keypoints',
	checkDiligence: API_URL + 'files/diligence/check',
	diligence: API_URL + 'files/diligence/create',
	boxToken: API_URL + 'box/access-token'
};
