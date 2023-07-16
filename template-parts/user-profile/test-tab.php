<div class="tab-pane fade" id="account-vertical-test" role="tabpanel" aria-labelledby="account-pill-test" aria-expanded="false">
                                    <h2>Add new student</h2>
                                    <div class="row">
                                        <div class="col-12">
                                            <form class="validate-form" action="" method="post">
                                                <table>
                                                    <tbody>
                                                    <tr>
                                                        <td><label> Name:</label>*</td>
                                                        <td><input name="FirstName" required type="text" placeholder="FirstName" /> <input name="LastName" required type="text" placeholder="LastName" /></td>
                                                    </tr>

                                                    <tr>
                                                        <td><label> Email:</label></td>
                                                        <td><input name="std_email" type="email" placeholder="email" value='std<?php echo rand(100100,999999);?>@muslimeto.com' readonly/></td>
                                                    </tr>

                                                    <tr>
                                                        <td><label> Gender: </label>*</td>
                                                        <td><select name="_Gender" required="required">
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label> Date of Birth:</label></td>
                                                        <td><input name="Birthday" type="date" value="[memb_contact fields=Birthday date_format="Y-m-d"]" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label> Parent: </label>*</td>
                                                        <td><select class="mult_sel" name="prt_sel" required="required">
                                                                <?php  $parents = get_users( array('role' => 'parent' ) ); foreach ($parents as $parent) : ?>
                                                                    <option value="<?php echo $parent->ID ?>"><?php echo $parent->display_name ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="submit" name="add_new_std" value="add" class="btn btn-primary glow mr-sm-1 mb-1">Add</button>
                                                </div>
                                            </form>
                                            <h2>Link child to a parent</h2>
                                            <form class="validate-form" action="" method="post">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Students</label>
                                                            <select class="form-control mult_sel" name="std_sel">
                                                                <?php  $parents = get_users( array('role' => 'student' ) ); foreach ($parents as $parent) :?>
                                                                    <option value="<?php echo $parent->ID ?>"><?php echo $parent->user_login ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Parents</label>
                                                            <select class="form-control mult_sel" name="prt_sel">
                                                                <?php  $parents = get_users( array('role' => 'parent' ) ); foreach ($parents as $parent) : ?>
                                                                    <option value="<?php echo $parent->ID ?>"><?php echo $parent->display_name ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" name="add_std" value="add" class="btn btn-primary glow mr-sm-1 mb-1">Link</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>