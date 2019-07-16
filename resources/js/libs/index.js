function getApiUrl() {
	let hn = window.location.hostname;
	return 'http://' + hn + '/';
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
	postPrinciples: API_URL + 'principles/create',
	boxToken: API_URL + 'box/access-token',
	boxRootFolder: API_URL + 'box/rootfolder',
	boxFolderItems: API_URL + 'box/folder/items/',
    boxCreateFolder: API_URL + '/box/folder/create',
    boxCopyFolder: API_URL + '/box/folder/copy',
};
