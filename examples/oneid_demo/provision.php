<?php require("oneid.php") ?>
<?php echo $oneid_script; ?>

Click on the button below to create your OneID.<P>

Your OneID will be created with the following bits of information.<br>
First Name: Barack<br>
Last Name: Obama<br>
Address: 1600 Whitehouse Ave<br>
City: Washington<br>
State: D.C.<br>
<script type="text/javascript">
/*
 * Magento -> OneId attribute mapping functions
 */
var state_map = {
            AL:1,
            AK:2,
            AS:3,
            AZ:4,
            AR:5,
            AA:7,
            AE:9,
            AP:11,
            CA:12,
            CO:13,
            CT:14,
            DE:15,
            DC:16,
            FL:18,
            GA:19,
            GU:20,
            HI:21,
            ID:22,
            IL:23,
            IN:24,
            IA:25,
            KS:26,
            LY:27,
            LA:28,
            ME:29,
            MD:31,
            MA:32,
            MI:33,
            MN:34,
            MS:35,
            MO:36,
            MT:37,
            NE:38,
            NV:39,
            NH:40,
            NJ:41,
            NM:42,
            NY:43,
            NC:44,
            ND:45,
            MP:46,
            OJ:47,
            OK:48,
            OR:49,
            PA:51,
            PR:52,
            RI:53,
            SC:54,
            SD:55,
            TN:56,
            TX:57,
            UT:58,
            VT:59,
            VI:60,
            VA:61,
            WA:62,
            WV:63,
            WI:64,
            WY:65
        }

// OneIdUtil.registerAttributeMappingFunction takes in 3 parameters
// the oneid_attribute name
// mapping toOneId -- True if the function maps from your data standards to OneID, false if OneID to your standards.
// mapping function
        OneIdUtil.registerAttributeMappingFunction("billing_state", false, function(state_val){
            return state_map[state_val];
        });

        OneIdUtil.registerAttributeMappingFunction("billing_state", true, function(state_val){
            for (state in state_map){
                if (state_map[state] == state_val) {
                    return state;
                }
            }
            return null;
        });
 </script>


        <?php echo OneID_Provision("bobby+z" . rand(10000, 99000) . "@oneid.com", array("firstname" => "Barack", "lastname" => "Obama", "billing_address" => "1600 Whitehouse Ave", "billing_city"=>"Washington", "billing_state"=>"16"), "http://localhost/demo/login.php"); ?>
