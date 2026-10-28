<style>
* { box-sizing: border-box; }
.job-grid { padding: 0; margin: 0; }
.job-card .pp-list {display: flex;flex-wrap: wrap;padding: 0;margin: 0;width: 100%;margin-right: -0.75rem;width: calc(100% + 0.75rem);}
.job-card .pp-item {display: flex;flex-direction: column;flex: 0 0 calc(25% - 0.75rem);min-height: 193px;border: 1px solid #999;border-radius: 5px;  margin-right: 0.75rem;margin-bottom: 0.55rem;overflow: hidden; }
.job-card .pp-item:nth-child(4n) { margin-right: 0.75rem; }
.job-card .pp-item a { text-decoration: none !important; color: inherit; }
.job-card .pp-item .logo { width: 100%; height: 85px; overflow: hidden; margin-top: 15px; text-align: center; }
.job-card .pp-list .logo img {width:190px;height:70px;image-rendering: -webkit-optimize-contrast;}
.job-card .pp-item .info {padding: 10px;flex-grow: 1; min-height: 77px;display: flex;flex-direction: column;justify-content: center;background-color: transparent;}
.job-card .pp-list .info h1 {font-size: 0.85rem;font-family: system-ui;font-weight:bold; text-align:center;margin:0 0 5px 0;color:#28517b;overflow:hidden;height:19px;line-height:19px;padding: 0px;}
.job-card .pp-list .info h2 {font-size: 0.8rem;font-family: system-ui;overflow:hidden;height:34px;line-height:16px;padding:3px 0px 0px 0px;margin:0px;text-align:center;font-weight:normal;word-wrap: break-word;word-break: break-all;}
.job-card .pp-list .info .region {font-size:0.7rem;font-family: system-ui;height:13px;margin-top:3px;text-align:right;line-height: 13px;overflow: hidden;color: #888888;}
.job-card .pp-list .is_new {background-color: #edf4f7;}

@media (max-width: 768px) {
    .job-card .pp-item { flex: 0 0 calc(50% - 0.75rem); }
    .job-card .pp-item:nth-child(4n) { margin-right: 0.75rem; }
    .job-card .pp-item:nth-child(2n) { margin-right: 0.75rem; }
}

@media (max-width: 480px) {
@media (max-width: 480px) {
    .job-card .pp-item { 
        flex: 1 1 100%; 
        margin-right: 0.75rem !important; 
    }

}
</style>
<!-- LOOP START 'T_LOOP' -->
            <div class="pp-item">
                <a href="{{T_LOOP.T_LINK}}">
                    <div class="logo"><img src="{{T_LOOP.T_LOGO_IMG}}" loading="lazy"></div>
                    <div class="info is_reg">
                        <h1>{{T_LOOP.T_COMPANY_NAME}}</h1>
                        <h2>{{T_LOOP.T_TITLE}}</h2>
                        <div class="region"><i class="fa fa-globe fs-3" aria-hidden="true"></i>&nbsp;{{T_LOOP.T_LOCATION}} </div>                        
                    </div>
                </a>
            </div>
<!-- LOOP END 'T_LOOP' -->

