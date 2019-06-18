function getApiUrl() {
	let hn = window.location.hostname;
	return 'http://' + hn + '/';
	
	if (hn === 'abstract.test') {
		return 'http://abstract.test/'
	} else {
		return window.location.hostname
	}
}
const API_URL = getApiUrl();
export default {
	////// Retrieve Files
	host: API_URL,
	getFiles: API_URL + 'getFiles',
	delFile: API_URL + 'destroy/file',
	saveKeyPoints: API_URL + 'security-flow/step-4/create/keyPoints',
	saveFundKeyPoints: API_URL + 'security-flow/blur/keypoints',
	checkDiligence: API_URL + 'files/diligence/check',
	diligence: API_URL + 'files/diligence/create',
	getPrinciples: API_URL + 'principles/get',
	boxToken: API_URL + 'box/access-token'
};
