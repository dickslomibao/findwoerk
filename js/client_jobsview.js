$(document).ready(async function () {
    const proposal_list = await displayProposal();
    proposal_list.forEach(element => {
        render(element);
    });

});

function render(element) {
    let html = `
        <div class="proposal-content">
            <a href= "client_proposalview.php?proposalid=`+element['id']+`" class='job-link'>
                <div class="job-basic-info">
                    <div class="content-info">
                        <img src="../../assets/profilepicture/`+element['profile_pic']+`" alt="Avatar" class="owner-avatar">
                        <div>
                            <h6 class="owner-name">`+element['fullname']+`</h6>
                            <p class="owner-major">Expertise: `+element['owner']+`</p>
                        </div>
                    </div>
                    <p class="time">Posted `+timeAgo(new Date(element['date_created']))+`</p>
                </div>
                <div class="proposal-title">
                    <h5 class="p-title">`+element['proposal_title']+`</h5>
                </div>
                <div class="other-info-bottom">
                    <p class="p-duration">Duration: `+element['proposal_duration']+`</p>
                    <p class="p-price">Price: P`+element['proposal_price']+`</p>
                </div>
            </a>
        </div>
    `;
    $("#render_proposal").append(html);
}
async function displayProposal() {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    let data;
    let result = await $.ajax({
        type: "POST",
        url: "../../classes/proposal_action.php",
        data: {
            'display-proposal': '',
            'jobid': urlParams.get('jobid'),
        }
    });
    data = JSON.parse(result);
    return data;
}