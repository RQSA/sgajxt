<?php
	//引入连接数据库文件
		require("../conn.php");
		
		$flag=$_POST["flag"];
		if($flag=="bumenDelete"){
			$gcid1=$_POST["gcid1"];
			$sql = "delete from 公司部门  where id = '$gcid1'";

			if ($conn->query($sql) === TRUE) {
	    		echo "删除成功";
			} else {
	    		echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}else if($flag=="appAccountDelete"){
			$mobile=$_POST["mobile"];
			

			$sql1 = "select * from 我的工程 where 总公司负责人A手机='".$mobile."'";
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0) {
				$sqlZgsA = "update 我的工程 set 总公司负责人A手机 = '',总公司负责人A='' where 总公司负责人A手机='".$mobile."'";
				$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
				if ($conn->query($sqlZgsA) === TRUE&&$conn->query($sqlUser) === TRUE) {
		    		echo "删除成功";
				} else {
		    		//echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}else{
				$sql1 = "select * from 我的工程 where 总公司负责人B手机='".$mobile."'";
				$result1 = $conn->query($sql1);
				if ($result1->num_rows > 0) {
					$sqlZgsA = "update 我的工程 set 总公司负责人B手机 = '',总公司负责人B='' where 总公司负责人B手机='".$mobile."'";
					$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
					if ($conn->query($sqlZgsA) === TRUE&&$conn->query($sqlUser) === TRUE) {
			    		echo "删除成功";
					} else {
			    		//echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}else{
					$sql1 = "select * from 我的工程 where 总公司负责人C手机='".$mobile."'";
					$result1 = $conn->query($sql1);
					if ($result1->num_rows > 0) {
						$sqlZgsA = "update 我的工程 set 总公司负责人C手机 = '',总公司负责人C='' where 总公司负责人C手机='".$mobile."'";
						$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
						if ($conn->query($sqlZgsA) === TRUE&&$conn->query($sqlUser) === TRUE) {
				    		echo "删除成功";
						} else {
				    		//echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}else{
						$sql1 = "select * from 我的工程 where 总部巡查员手机='".$mobile."'";
						$result1 = $conn->query($sql1);
						if ($result1->num_rows > 0) {
							$sqlZgsA = "update 我的工程 set 总部巡查员手机 = '',总部巡查员='' where 总部巡查员手机='".$mobile."'";
							$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
							if ($conn->query($sqlZgsA) === TRUE&&$conn->query($sqlUser) === TRUE) {
					    		echo "删除成功";
							} else {
					    		//echo "Error: " . $sql . "<br>" . $conn->error;
							}
						}else{
							$sql1 = "select * from 我的工程 where 项目经理手机='".$mobile."'";
							$result1 = $conn->query($sql1);
							if ($result1->num_rows > 0) {
								$sqlZgsA = "update 我的工程 set 项目经理手机 = '',项目经理='' where 项目经理手机='".$mobile."'";
								$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
								if ($conn->query($sqlZgsA) === TRUE&&$conn->query($sqlUser) === TRUE) {
						    		echo "删除成功";
								} else {
						    		//echo "Error: " . $sql . "<br>" . $conn->error;
								}
							}else{
								$sql1 = "select * from 我的工程 where 安全主管手机='".$mobile."'";
								$result1 = $conn->query($sql1);
								if ($result1->num_rows > 0) {
									$sqlZgsA = "update 我的工程 set 安全主管手机 = '',安全主管 = '' where 安全主管手机='".$mobile."'";
									$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
									if ($conn->query($sqlZgsA) === TRUE&&$conn->query($sqlUser) === TRUE) {
							    		echo "删除成功";
									} else {
							    		//echo "Error: " . $sql . "<br>" . $conn->error;
									}
								}else{
									$sql1 = "select * from 我的工程 where 安全员手机='".$mobile."'";
									$result1 = $conn->query($sql1);
									if ($result1->num_rows > 0) {
										$sqlZgsA = "update 我的工程 set 安全员手机 = '',安全员 = '' where 安全员手机='".$mobile."'";
										$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
										if ($conn->query($sqlZgsA) === TRUE&&$conn->query($sqlUser) === TRUE) {
								    		echo "删除成功";
										} else {
								    		//echo "Error: " . $sql . "<br>" . $conn->error;
										}
									}else{
										$sql1 = "select * from 我的工程 where 机械管理员手机='".$mobile."'";
										$result1 = $conn->query($sql1);
										if ($result1->num_rows > 0) {
											$sqlZgsA = "update 我的工程 set 机械管理员手机 = '',机械管理员 = '' where 机械管理员手机='".$mobile."'";
											$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
											if ($conn->query($sqlZgsA) === TRUE&&$conn->query($sqlUser) === TRUE) {
									    		echo "删除成功";
											} else {
									    		//echo "Error: " . $sql . "<br>" . $conn->error;
											}
										}else{
											$sql1 = "select * from 我的工程 where 联系方式='".$mobile."'";
											$result1 = $conn->query($sql1);
											if ($result1->num_rows > 0) {
												$sqlZgsA = "update 我的工程 set 联系方式 = '',责任人 = '' where 联系方式='".$mobile."'";
												$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
												if ($conn->query($sqlZgsA) === TRUE&&$conn->query($sqlUser) === TRUE) {
										    		echo "删除成功";
												} else {
										    		//echo "Error: " . $sql . "<br>" . $conn->error;
												}
											}else{
												$sql1 = "select * from 我的工程 where 部门负责人A手机='".$mobile."'";
												$result1 = $conn->query($sql1);
												if ($result1->num_rows > 0) {
													$sqlZgsA = "update 我的工程 set 部门负责人A手机 = '',部门负责人A = '' where 部门负责人A手机='".$mobile."'";
													$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
													if ($conn->query($sqlZgsA) === TRUE&&$conn->query($sqlUser) === TRUE) {
											    		echo "删除成功";
													} else {
											    		//echo "Error: " . $sql . "<br>" . $conn->error;
													}
												}else{
													$sql1 = "select * from 我的工程 where 部门负责人B手机='".$mobile."'";
													$result1 = $conn->query($sql1);
													if ($result1->num_rows > 0) {
														$sqlZgsA = "update 我的工程 set 部门负责人B手机 = '',部门负责人B = '' where 部门负责人B手机='".$mobile."'";
														$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
														if ($conn->query($sqlZgsA) === TRUE&&$conn->query($sqlUser) === TRUE) {
												    		echo "删除成功";
														} else {
												    		//echo "Error: " . $sql . "<br>" . $conn->error;
														}
													}else{
														$sql1 = "select * from 我的工程 where 部门负责人C手机='".$mobile."'";
														$result1 = $conn->query($sql1);
														if ($result1->num_rows > 0) {
															$sqlZgsA = "update 我的工程 set 部门负责人C手机 = '',部门负责人C= '' where 部门负责人C手机='".$mobile."'";
															$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
															if ($conn->query($sqlZgsA) === TRUE&&$conn->query($sqlUser) === TRUE) {
													    		echo "删除成功";
															} else {
													    		//echo "Error: " . $sql . "<br>" . $conn->error;
															}
														}else{
															$sql1 = "select * from 我的工程 where 生产经理手机='".$mobile."'";
															$result1 = $conn->query($sql1);
															if ($result1->num_rows > 0) {
																$sqlZgsA = "update 我的工程 set 生产经理手机 = '',生产经理 = '' where 生产经理手机='".$mobile."'";
																$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
																if ($conn->query($sqlZgsA) === TRUE&&$conn->query($sqlUser) === TRUE) {
														    		echo "删除成功";
																} else {
														    		//echo "Error: " . $sql . "<br>" . $conn->error;
																}
															}else{
																$sql1 = "select * from 我的工程 where 质量员手机='".$mobile."'";
																$result1 = $conn->query($sql1);
																if ($result1->num_rows > 0) {
																	$sqlZgsA = "update 我的工程 set 质量员手机 = '',质量员 = '' where 质量员手机='".$mobile."'";
																	$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
																	if ($conn->query($sqlZgsA) === TRUE&&$conn->query($sqlUser) === TRUE) {
															    		echo "删除成功";
																	} else {
															    		//echo "Error: " . $sql . "<br>" . $conn->error;
																	}
																}else{
																	$sql1 = "select * from 工程管理人员 where 联系方式='".$mobile."'";
																	$result1 = $conn->query($sql1);
																	if ($result1->num_rows > 0) {
																		$sqlZgsA = "delete from 工程管理人员 where 联系方式='".$mobile."'";
																		$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
																		if ($conn->query($sqlZgsA) === TRUE&&$conn->query($sqlUser) === TRUE) {
																    		echo "删除成功";
																		} else {
																    		//echo "Error: " . $sql . "<br>" . $conn->error;
																		}
																	}else{
																		$sql1 = "select * from 工程动态添加手机 where mobileZgs like '%".$mobile."%'";
																		$result1 = $conn->query($sql1);
																		if ($result1->num_rows > 0) {
																			while($row = $result2->fetch_assoc()) {
					 															$mobileZgs=$row["mobileZgs"];
					 															$sjc=$row["时间戳"];
					 															$mobileArray=explode(",", $mobileZgs);
					 															$length=count($mobileArray)-1;
					 															$zuhe="";
					 															for($i=0;$i<$length;$i++){
					 																if($mobileArray[$i]==$mobile){
					 																	
					 																}else{
					 																	$zuhe.=$mobileArray[$i].",";
					 																}
					 															}
					 															$sqlZgsA = "update 工程动态添加手机 set mobileZgs = '$zuhe' where 时间戳='".$sjc."'";
																				if ($conn->query($sqlZgsA) === TRUE) {
																		    		echo "删除成功";
																				} else {
																		    		//echo "Error: " . $sql . "<br>" . $conn->error;
																				}
																			}
																			$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
																			if ($conn->query($sqlUser) === TRUE) {
																				
																			}
																		}else{
																			$sql1 = "select * from 工程动态添加手机 where mobileOther like '%".$mobile."%'";
																			$result1 = $conn->query($sql1);
																			if ($result1->num_rows > 0) {
																				while($row = $result2->fetch_assoc()) {
						 															$mobileZgs=$row["mobileZgs"];
						 															$sjc=$row["时间戳"];
						 															$mobileArray=explode(",", $mobileZgs);
						 															$length=count($mobileArray)-1;
						 															$zuhe="";
						 															for($i=0;$i<$length;$i++){
						 																if($mobileArray[$i]==$mobile){
						 																	
						 																}else{
						 																	$zuhe.=$mobileArray[$i].",";
						 																}
						 															}
						 															$sqlZgsA = "update 工程动态添加手机 set mobileOther = '$zuhe' where 时间戳='".$sjc."'";
																					if ($conn->query($sqlZgsA) === TRUE) {
																			    		echo "删除成功";
																					} else {
																			    		//echo "Error: " . $sql . "<br>" . $conn->error;
																					}
																				}
																				$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
																				if ($conn->query($sqlUser) === TRUE) {
																				
																				}
																			}else{
																				$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
																				if ($conn->query($sqlUser) === TRUE) {
																				
																				}else{
																					$sql1 = "select * from 我的工程 where 质量员手机='".$mobile."'";
																					$result1 = $conn->query($sql1);
																					if ($result1->num_rows > 0) {
																						$sqlZgsA = "update 我的工程 set 质量员手机 = '',质量员 = '' where 质量员手机='".$mobile."'";
																						$sqlUser = "delete from 用户信息  where 手机 = '$mobile' and 设备='手机'";
																						if ($conn->query($sqlZgsA) === TRUE&&$conn->query($sqlUser) === TRUE) {
																				    		echo "删除成功";
																						} else {
																				    		//echo "Error: " . $sql . "<br>" . $conn->error;
																						}
																					}
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
		

		$conn->close();		
?>