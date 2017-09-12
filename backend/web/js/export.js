$(
    function method1(table_id)//整个表格拷贝到Excel中
    {   //创建 AX 对象 excel
        var curTbl = document.getElmentById(table_id);
        var oXL = new ActiveXObject("Excel.Application");
        //获取 workbook 对象
        var oWB = oXL.Workbooks.Add();
        //激活当前 sheet
        var oSheet=oWb.ActiveSheet;
        // 把表格内容移到 TextRange 中
        var sel = document.body.createTextRange();
        sel.moveToElementText(curTbl);
        // 全选 TextRange 中内容
        sel.select();
        // 复制 TextRange 中内容
        oSheet.execCommand("Copy");
        // 粘贴到活动的 EXCEL 中
        oSheet.Paste();
        //设置 Excel 可见属性
        oXL.Visible = true;
    }
    function method2(table_id)
    {//读取表格中的每个单元到 Excel
        var curTbl = document.getElementById(table_id);
        //创建 AX 对象 excel
        var oXL = new ActiveXObject("Excel.Application");
        //获取 workbook 对象
        var oWB = oXL.WorkBooks.Add();
        // 激活当前 sheet
        var oSheet = oWB.ActiveSheet;
        // 取得表格行数
        var Lenr = curTbl.rows.length;
        for(i =0; i<Lenr;i++){
            // 取得每行的列数
            for(j=0;j<Lenc;j++){
                //赋值
                oSheet.Cells(i+1,j+1).value = curTbl.row(i).cells(j).innerText;
            }
        }
        //设置 Excel 可见属性
        oXL.Visible = true;
        oXl.save(table_id+".xlsx");
    }
    function getXlsFromTbl(inTblid,inWindow)
    {
        try{
            var allStr = "";
            var curStr = "";
            if(inTblid != null && inTblid !="" && inTblid != "null"){
                curStr = getTblData(inTblid,inWindow);
            }
            if(curStr != null){
                allStr += curStr;
            } else {
                alert("你要导出的表不存在！");
                return ;
            }

        } catch (e){
            alert("导出发生异常："+e.name+"->"+e.description+"!");
        }
    }
    function getTblData(inTbl,inWindow){
        var rows = 0;
        var tblDocument =document;
        if(!!inWindow && inWindow !=""){
            if(!document.all(inWindow)){
                return null;
            } else {
                tblDocument = eval(inWindow).document;
            }
        }
        var curTbl = tblDocument.getElementById(inTbl);
        var outStr = "";
        if(curTbl !=null){
            for(var j=0;j<curTbl.rows.length;j++){
                for(var i=0;i<curTbl.rows[j].cells.length;i++){
                    if(i==0&&rows>0){
                        outStr +="\t";
                        rows -=1;
                    }
                    outStr += curTbl.rows[j].cells[i].innerText+"\t";
                    if(curTbl.rows[j].cells[i].colSpan >1){
                        for(var k=0;k< curTbl.rows[j].cells[i].colSpan-1;k++){
                            outStr += "\t";
                        }
                    }
                    if(i == 0){
                        if(rows ==0 && curTbl.rows[j].cells[i].rowSpan>1){
                            rows = curTbl.rows[j].cells[i].rowSpan-1;
                        }
                    }
                }
                outStr +="\r\n";
            }
        } else {
            outStr = null;
            alert(inTbl+"不存在！");
        }
        return outStr;
    }
    function reSetForm(var curTime){
        if(curTime.length == 1){
            curTime = "0"+curTime;
        }
        return curTime;
    }
    function getExcelFileName()
    {
        var d = new Date();
        var curYear = d.getYear();
        var curMonth = reSetForm(""+(d.getMonth()+1));
        var curDate = reSetForm(""+d.getDate());
        var curHour = reSetForm(""+d.getHours());
        var curMinute = reSetForm(""+d.getMinutes());
        var curSecond = reSetForm(""+d.getSecond());
        var fileName = curYear+curMonth+curDate+"_"+curHour+curMinute+curSecond+".csv";
        return fileName;

    }
    function doFileExport(inName,inStr){
        var xlsWin = null;
        if(!!document.all("glbHideFrm")){
            xlsWin = glbHideFrm;
        } else {
            var width = 6;
            var height = 4;
            var openPara = "left="+(window.screen.width/2-width/2)
                +",top="+(window.screen.height/2-height/2)+",scrollbars=no,width="+width
                +",height="+height;
            xlsWin = window.open("","_blank",openPara);

        }
        xlsWin.document.write(inStr);
        xlsWin.document.close();
        xlsWin.document.exceCommand('Saveas',true,inName);
        xlsWin.close();
    }
)
